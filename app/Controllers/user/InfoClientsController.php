<?php

namespace App\Controllers\user;

use CodeIgniter\Controller;
use App\Models\ClientseModel;
use App\Models\SupplierModel;

class InfoClientsController extends Controller
{
    public function index()
    {
        $model = new ClientseModel();
        $userId = session()->get('user_id');

        $supplierModel = new \App\Models\SupplierModel();

        // Récupérer d'abord le fournisseur
        $supplier = $supplierModel->where('user_id', $userId)->first();

        if (!$supplier) {
            return redirect()->back()->with('error', 'Fournisseur non trouvé.');
        }

        // Récupérer les données existantes avec supplier_id
        $existingData = $model->where('supplier_id', $supplier['id'])->first();

        // Passer les données à la vue
        return view('user/info_clients', ['data' => $existingData]);
    }

    public function store()
    {
        $model = new ClientseModel();
        $supplierModel = new SupplierModel();

        // 1. Récupérer le user_id de l'utilisateur connecté
        $userId = session()->get('user_id');

        // 2. Utiliser ce user_id pour trouver le supplier correspondant
        $supplier = $supplierModel->where('user_id', $userId)->first();

        if (!$supplier) {
            return redirect()->back()->with('error', 'Fournisseur non trouvé.');
        }

        // Vérifier si l'enregistrement existe déjà
        $existingData = $model->where('supplier_id', $supplier['id'])->first();

        // 3. Récupérer les données du formulaire
        $data = [
            'supplier_id' => $supplier['id'],
            'principaux_clients' => $this->request->getPost('principaux_clients'),
            'exemple_projets' => $this->request->getPost('exemple_projets'),
        ];

        if ($existingData) {
            $model->update($existingData['id'], (object)$data);
        } else {
            $model->save($data);
        }

        return redirect()->to('/my-informations-contact')->with('message', 'Données enregistrées avec succès.');
    }
}
