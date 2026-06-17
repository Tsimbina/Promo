<?php

namespace App\Controllers;

use App\Models\AchatMere;
use App\Models\AchatFille;
use App\Models\Produit;
class AchatController extends BaseController
{
    public function index()
    {
        $produitModel = new Produit();
        $produits = $produitModel->findAll();

        return view('achat/index',['produits'=> $produits ]);
    }

    public function create()
    {
        $cartData = $this->request->getPost('cart_data');
        if (empty($cartData)) {
            return redirect()->to('/achat/saisie')->with('error', 'Le panier est vide.');
        }

        $items = json_decode($cartData, true);
        if (!is_array($items)) {
            return redirect()->to('/achat/saisie')->with('error', 'Données du panier invalides.');
        }

        // Appel du modèle
        $achatModel = new AchatMere();
        $result = $achatModel->enregistrerAchat($items,session()->get('caisse_id'));
        return redirect()->to('/achat/saisie');
    }


}
