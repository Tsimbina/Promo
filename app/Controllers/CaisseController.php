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

    
    public function checkCaisseId($id)
    {
        $caisseModel = new Caisse();
        $caisse = $caisseModel->find($id);

        if ($caisse) {
            session()->set('caisse_id', $caisse['id']);
            return redirect()->to('/achat/saisie');
        }

        return redirect()->to('/caisses')->with('error', 'Caisse non trouvee.');
    }
    public function checkCaisse()
    {
        $id = $this->request->getGet('num'); 
        return $this->checkCaisseId($id);
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