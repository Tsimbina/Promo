<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatMere extends Model
{
    protected $table = 'achat_mere';
    protected $primaryKey = 'id';
    protected $allowedFields = ['caisse_id', 'date_achat', 'prix_total'];

    public function enregistrerAchat(array $items, $caisse)
    {
        $this->validerPanier($items);
        $this->validerStock($items);

        $produitsParId = $this->recupererProduits($items);
        

        $prixTotal = $this->calculerPrixTotal($items, $produitsParId);

        $caisseModel = new Caisse();
        $caisse = $caisseModel->first();
        $caisseId = $caisse['id'];

        $db = \Config\Database::connect();
        $db->transStart();

        try {

            $mereId = $this->creerAchatMere($caisseId, $prixTotal);

            $typeSortieCode = $this->recupererTypeSortie();

            $this->creerDetailsAchat(
                $mereId,
                $items,
                $produitsParId,
                $typeSortieCode
            );

            $db->transCommit();

            return $mereId;

        } catch (\Exception $e) {
            $db->transRollback();
            throw $e;
        }
    }

    private function validerPanier(array $items)
    {
        if (empty($items)) {
            throw new \Exception('Aucun article dans le panier.');
        }

        foreach ($items as $item) {
            if (!isset($item['id'], $item['qty']) || $item['qty'] <= 0) {
                throw new \Exception('Un article du panier est invalide.');
            }
        }
    }

    private function recupererProduits(array $items): array
    {
        $produitModel = new Produit();

        $ids = array_column($items, 'id');

        $produits = $produitModel
            ->whereIn('id', $ids)
            ->findAll();

        if (count($produits) !== count($ids)) {
            throw new \Exception('Un ou plusieurs produits sont introuvables.');
        }

        $produitsParId = [];

        foreach ($produits as $produit) {
            $produitsParId[$produit['id']] = $produit;
        }

        return $produitsParId;
    }

    private function calculerPrixTotal(array $items, array $produitsParId): float
    {
        $prixTotal = 0;

        foreach ($items as $item) {

            $id = $item['id'];

            if (!isset($produitsParId[$id])) {
                throw new \Exception("Le produit ID $id n'existe pas.");
            }

            $prixTotal +=
                $produitsParId[$id]['prix_unitaire']
                * $item['qty'];
        }

        return $prixTotal;
    }

    private function creerAchatMere(int $caisseId, float $prixTotal): int
    {
        $mereId = $this->insert([
            'caisse_id' => $caisseId,
            'prix_total' => $prixTotal,
            'date_achat' => date('Y-m-d H:i:s')
        ]);

        if (!$mereId) {
            throw new \Exception(
                'Erreur lors de l\'insertion de l\'achat mère.'
            );
        }

        return $mereId;
    }

    private function recupererTypeSortie(): string
    {
        $typeMvtModel = new TypeMouvement();

        $typeSortie = $typeMvtModel
            ->where('code', 'SORTIE')
            ->first();

        if (!$typeSortie) {

            $typeSortieId = $typeMvtModel->insert([
                'code' => 'SORTIE',
                'libelle' => 'Sortie pour vente'
            ]);

            if (!$typeSortieId) {
                throw new \Exception(
                    'Type de mouvement "SORTIE" introuvable et impossible à créer.'
                );
            }

            return 'SORTIE';
        }

        return $typeSortie['code'];
    }

    private function creerDetailsAchat(
        int $mereId,
        array $items,
        array $produitsParId,
        string $typeSortieCode
    ): void {
        $filleModel = new AchatFille();
        $mouvementModel = new MouvementStock();

        foreach ($items as $item) {

            $produit = $produitsParId[$item['id']];
            $prixUnitaire = $produit['prix_unitaire'];
            $quantite = $item['qty'];

            if (
                !$filleModel->insert([
                    'achat_mere_id' => $mereId,
                    'produit_id' => $item['id'],
                    'quantite' => $quantite,
                    'prix_unitaire' => $prixUnitaire
                ])
            ) {
                throw new \Exception(
                    'Erreur insertion ligne fille pour produit ' . $item['id']
                );
            }

            if (
                !$mouvementModel->insert([
                    'produit_id' => $item['id'],
                    'code_mouvement' => $typeSortieCode,
                    'quantite' => -$quantite,
                    'date_mouvement' => date('Y-m-d H:i:s')
                ])
            ) {
                throw new \Exception(
                    'Erreur mouvement de stock pour produit ' . $item['id']
                );
            }
        }
    }

    private function validerStock(array $items): void
    {
        $produitModel = new Produit();

        foreach ($items as $item) {

            if (
                !$produitModel->assezDeStock(
                    $item['qty'],
                    $item['id']
                )
            ) {
                throw new \Exception(
                    'Stock insuffisant pour le produit ID ' . $item['id']
                );
            }
        }
    }
}