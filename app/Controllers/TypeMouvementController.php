<?php

namespace App\Controllers;

use App\Models\TyreMouvement;

class TypeMouvementController extends BaseController
{
    public function index()
    {
        $typeMouvementModel = new \App\Models\TypeMouvement();
        $typeMouvements = $typeMouvementModel->findAll();

        return view('type_mouvements/index', ['type_mouvements' => $typeMouvements]);
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $typeMouvementModel = new \App\Models\TypeMouvement();
            $typeMouvementModel->insert($this->request->getPost());

            return redirect()->to('/type_mouvements')->with('message', 'Type de mouvement cree avec succes.');
        }

        return view('type_mouvements/create');
    }
}