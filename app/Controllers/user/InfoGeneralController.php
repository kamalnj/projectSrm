<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\CompanyModel;
use CodeIgniter\Controller;

class InfoGeneralController extends Controller
{
    public function index()
    {
        $model = new CompanyModel();
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
        return view('user/info_general', [
            'data' => $existingData,
            'supplier' => $supplier
        ]);
    }
    public function store()
    {
        $model = new CompanyModel();
        $supplierModel = new \App\Models\SupplierModel();
        
        $userId = session()->get('user_id');
        $supplier = $supplierModel->where('user_id', $userId)->first();
        
        if (!$supplier) {
            return redirect()->back()->with('error', 'Fournisseur non trouvé.');
        }

        // Vérifier si l'enregistrement existe déjà
        $existingData = $model->where('supplier_id', $supplier['id'])->first();

        $data = [
            'supplier_id' => $supplier['id'],
            'date_creation' => $this->request->getPost('date_creation'),
            'effectif' => $this->request->getPost('effectif'),
            'forme_juridique' => $this->request->getPost('forme_juridique'),
            'capital_social' => $this->request->getPost('capital_social'),
            'adresse_siege' => $this->request->getPost('adresse_siege'),
            'n_rc' => $this->request->getPost('n_rc'),
            'lieu_immatriculation' => $this->request->getPost('lieu_immatriculation'),
            'n_if' => $this->request->getPost('n_if'),
            'n_patente' => $this->request->getPost('n_patente'),
            'n_ice' => $this->request->getPost('n_ice'),
            'email' => $this->request->getPost('email'),
            'telephone' => $this->request->getPost('telephone'),
            'site_web' => $this->request->getPost('site_web'),
        ];
    
        if ($existingData) {
            $model->update($existingData['id'], (object)$data);
        } else {
            $model->insert((object)$data);
        }

        return redirect()->to('/user/my-informations-flr');
    }
    
}
