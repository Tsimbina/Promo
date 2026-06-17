<?php

namespace App\Controllers;

use App\Models\Caisse;

class CaisseController extends BaseController
{
    public function index()
    {
        $caisseModel = new Caisse();
        $caisses = $caisseModel->findAll();

        return view('caisses/index', ['caisses' => $caisses]);
    }

    public function checkCaisse($id)
    {
        $caisseModel = new Caisse();
        $caisse = $caisseModel->find($id);

        if ($caisse) {
            return view('achats/saisie', ['caisse' => $caisse]);
        }

        return redirect()->to('/caisses')->with('error', 'Caisse non trouvee.');
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $caisseModel = new Caisse();
            $caisseModel->insert($this->request->getPost());

            return redirect()->to('/caisses')->with('message', 'Caisse creee avec succes.');
        }

        return view('caisses/create');
    }
}