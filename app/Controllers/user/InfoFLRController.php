<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\CompanyInfoFLRModel;

class InfoFLRController extends BaseController
{
    public function index()
    {
        $model = new CompanyInfoFLRModel();
        $supplierModel = new \App\Models\SupplierModel();
        $userId = session()->get('user_id');

        // Récupérer d'abord le fournisseur
        $supplier = $supplierModel->where('user_id', $userId)->first();

        if (!$supplier) {
            return redirect()->back()->with('error', 'Fournisseur non trouvé.');
        }

        // Récupérer les données existantes avec supplier_id
        $existingData = $model->where('supplier_id', $supplier['id'])->first();

        // Passer les données à la vue
        return view('user/info_F_L_R', ['data' => $existingData]);
    }

    public function store()
    {
        $model = new CompanyInfoFLRModel();
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
            'chiffre_affaires_1' => $this->request->getPost('chiffre_affaires_1'),
            'chiffre_affaires_2' => $this->request->getPost('chiffre_affaires_2'),
            'chiffre_affaires_3' => $this->request->getPost('chiffre_affaires_3'),
            'conditions_paiement' => $this->request->getPost('conditions_paiement'),
            'modalites_facturation' => $this->request->getPost('modalites_facturation'),
            'principaux_actionnaires' => $this->request->getPost('principaux_actionnaires'),
            'representant_legal' => $this->request->getPost('representant_legal'),
            'qualite_representant_legal' => $this->request->getPost('qualite_representant_legal'),
            'maison_mere_filiales' => $this->request->getPost('maison_mere_filiales'),
            'certifications_qualite' => $this->request->getPost('certifications_qualite'),
            'licences_autorisations' => $this->request->getPost('licences_autorisations'),
            'polices_assurances' => $this->request->getPost('polices_assurances'),
            'plan_continuite' => $this->request->getPost('plan_continuite') ? 1 : 0,
            'politique_rse' => $this->request->getPost('politique_rse') ? 1 : 0,
            'pratiques_ethiques' => $this->request->getPost('pratiques_ethiques') ? 1 : 0,
        ];

        if ($existingData) {
            $model->update($existingData['id'], (object)$data);
        } else {
            $model->save($data);
        }

        return redirect()->to('/my-informations-clients')->with('success', 'Informations enregistrées avec succès.');
    }
}
