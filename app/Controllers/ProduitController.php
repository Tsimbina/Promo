<?php

namespace App\Controllers;

use App\Models\Produit;
use App\Models\MouvementStock;
class ProduitController extends BaseController
{
    public function index()
    {
        $produitModel = new Produit();
        $produits = $produitModel->findAll();

        return view('produits/index', ['produits' => $produits]);
    }

    public function getInformationForAchat($id)
    {
        $produitModel = new Produit();
        $produit = $produitModel->find($id);

        if ($produit) {
            return view('achats/saisie', ['produit' => $produit]);
        }

        return redirect()->to('/achats/saisie')->with('error', 'Produit non trouve.');
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $produitModel = new Produit();
            $produitModel->insert($this->request->getPost());

            return redirect()->to('/produits')->with('message', 'Produit cree avec succes.');
        }

        return view('produits/create');
    }
    public function stock()
{
    $produitModel = new Produit();
    $mouvementModel = new MouvementStock();

    $produits = $produitModel->findAll();

    $data = [];

    foreach ($produits as $p) {

        $entree = $mouvementModel
            ->selectSum('quantite')
            ->where('produit_id', $p['id'])
            ->where('code_mouvement', 'ENTREE')
            ->first()['quantite'] ?? 0;

        $sortie = $mouvementModel
            ->selectSum('quantite')
            ->where('produit_id', $p['id'])
            ->where('code_mouvement', 'SORTIE')
            ->first()['quantite'] ?? 0;

        $stock = $entree - $sortie;

        $data['stocks'][] = [
            'designation' => $p['designation'],
            'prix_unitaire' => $p['prix_unitaire'],
            'stock' => $stock
        ];
    }

    return view('produit/stock', $data);
}
}
