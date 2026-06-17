<?php

namespace App\Controllers;

use App\Models\Produit;

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
}
