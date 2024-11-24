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

        // Récupérer les données existantes
        $existingData = $model->where('user_id', $userId)->first();

        // Passer les données à la vue
        return view('user/info_general', ['data' => $existingData]);
    }
    public function store()
    {
        $model = new CompanyModel();
        $userId = session()->get('user_id');

        // Vérifiez si l'enregistrement existe déjà
        $existingData = $model->where('user_id', $userId)->first();

        $data = [
            'user_id' => $userId,
            'entreprise' => $this->request->getPost('entreprise'),
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
            // Update the existing record
            $model->where('id', $existingData['id'])->set($data)->update();
        } else {
            // Insert a new record, ensure array compatibility
            $model->insert((object) $data);
        }


        // Rediriger vers le formulaire suivant
        return redirect()->to('/my-informations-flr');
    }
    
}
