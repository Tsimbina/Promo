<?php

namespace App\Controllers;

use App\Models\AchatMere;
use App\Models\AchatFille;

class AchatController extends BaseController
{
    public function index()
    {
        $achatMereModel = new AchatMere();
        $achats = $achatMereModel->findAll();

        return view('achats/saisie');
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $achatMereModel = new AchatMere();
            $achatFilleModel = new AchatFille();

            $achatMereId = $achatMereModel->insert($this->request->getPost());

            $produits = $this->request->getPost('produits');
            foreach ($produits as $produit) {
                $achatFilleModel->insert([
                    'achat_mere_id' => $achatMereId,
                    'produit_id' => $produit['produit_id'],
                    'quantite' => $produit['quantite'],
                    'prix_unitaire' => $produit['prix_unitaire']
                ]);
            }

            return redirect()->to('/achats')->with('message', 'Achat cree avec succes.');
        }

        return view('achats/create');
    }
}
