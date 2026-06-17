<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatMere extends Model
{
    protected $table = 'achat_mere'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['caisse_id', 'date_achat', 'prix_total'];

   
    public function enregistrerAchat(array $items,$caisse)
    {
        if (empty($items)) {
            throw new \Exception('Aucun article dans le panier.');
        }

        foreach ($items as $item) {
            if (!isset($item['id'], $item['qty']) || $item['qty'] <= 0) {
                throw new \Exception('Un article du panier est invalide.');
            }
        }

        $produitModel = new Produit();
        $ids = array_column($items, 'id');
        $produits = $produitModel->whereIn('id', $ids)->findAll();
        if (count($produits) !== count($ids)) {
            throw new \Exception('Un ou plusieurs produits sont introuvables.');
        }

        $produitsParId = [];
        foreach ($produits as $p) {
            $produitsParId[$p['id']] = $p;
        }

        $prixTotal = 0;
        foreach ($items as $item) {
            $id = $item['id'];
            if (!isset($produitsParId[$id])) {
                throw new \Exception("Le produit ID $id n'existe pas.");
            }
            $prixTotal += $produitsParId[$id]['prix_unitaire'] * $item['qty'];
        }

        $caisseModel = new Caisse();
        $caisse = $caisseModel->first();
        $caisseId = $caisse['id'];

        // Début de transaction
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // 1. Insertion dans achat_mere
            $mereModel = new AchatMere();
            $mereId = $mereModel->insert([
                'caisse_id'   => $caisseId,
                'prix_total'  => $prixTotal,
                'date_achat'  => date('Y-m-d H:i:s')
            ]);
            if (!$mereId) {
                throw new \Exception('Erreur lors de l\'insertion de l\'achat mère.');
            }

            // 2. Récupération du type de mouvement "SORTIE"
            $typeMvtModel = new TypeMouvement();
            $typeSortie = $typeMvtModel->where('code', 'SORTIE')->first();
            if (!$typeSortie) {
                // Créer le type SORTIE s'il n'existe pas
                $typeSortieId = $typeMvtModel->insert(['code' => 'SORTIE', 'libelle' => 'Sortie pour vente']);
                if (!$typeSortieId) {
                    throw new \Exception('Type de mouvement "SORTIE" introuvable et impossible à créer.');
                }
                $typeSortieCode = 'SORTIE';
            } else {
                $typeSortieCode = $typeSortie['code'];
            }

            // 3. Insertion des lignes filles et mouvements de stock
            $filleModel = new AchatFille();
            $mouvementModel = new MouvementStock();

            foreach ($items as $item) {
                $produit = $produitsParId[$item['id']];
                $prixUnitaire = $produit['prix_unitaire'];
                $quantite = $item['qty'];

                // achat_fille
                $filleData = [
                    'achat_mere_id' => $mereId,
                    'produit_id'    => $item['id'],
                    'quantite'      => $quantite,
                    'prix_unitaire' => $prixUnitaire
                ];
                if (!$filleModel->insert($filleData)) {
                    throw new \Exception('Erreur insertion ligne fille pour produit ' . $item['id']);
                }

                // Mouvement de stock (sortie)
                $mouvementData = [
                    'produit_id'      => $item['id'],
                    'code_mouvement'  => $typeSortieCode,
                    'quantite'        => -$quantite, // négatif pour sortie
                    'date_mouvement'  => date('Y-m-d H:i:s')
                ];
                if (!$mouvementModel->insert($mouvementData)) {
                    throw new \Exception('Erreur mouvement de stock pour produit ' . $item['id']);
                }
            }

            $db->transCommit();

            return $mereId;
        } catch (\Exception $e) {
            $db->transRollback();
            throw $e; // On relance pour que le contrôleur gère l'affichage
        }
    }
}