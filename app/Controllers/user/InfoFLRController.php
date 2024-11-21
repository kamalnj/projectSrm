<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\CompanyInfoFLRModel;

class InfoFLRController extends BaseController
{
    public function index()
    {
        $model = new CompanyInfoFLRModel();
        $userId = session()->get('user_id');

        // Récupérer les données existantes
        $existingData = $model->where('user_id', $userId)->first();

        // Passer les données à la vue
        return view('user/info_F_L_R', ['data' => $existingData]);
    }

    public function store()
    {
        $model = new CompanyInfoFLRModel();

        $userId = session()->get('user_id');

        $data = [
            'user_id' => $userId,
            'chiffre_affaires' => $this->request->getPost('chiffre_affaires'),
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

        if (!$model->save($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/infoFLR')->with('success', 'Informations enregistrées avec succès.');
    }
}
