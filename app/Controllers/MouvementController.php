<?php

namespace App\Controllers;

use App\Models\MouvementStock;

class MouvementController extends BaseController
{
    public function index()
    {
        $mouvementStockModel = new MouvementStock();
        $mouvements = $mouvementStockModel->findAll();

        return view('mouvements/index', ['mouvements' => $mouvements]);
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $mouvementStockModel = new MouvementStock();
            $mouvementStockModel->insert($this->request->getPost());

            return redirect()->to('/mouvements')->with('message', 'Mouvement de stock cree avec succes.');
        }

        return view('mouvements/create');
    }
}