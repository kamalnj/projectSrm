<?php

namespace App\Controllers\user;

use CodeIgniter\Controller;
use App\Models\ClientseModel;

class InfoClientsController extends Controller
{
    public function index()
    {
        $model = new ClientseModel();
        $userId = session()->get('user_id');

        // Récupérer les données existantes
        $existingData = $model->where('user_id', $userId)->first();

        // Passer les données à la vue
        return view('user/info_clients', ['data' => $existingData]);
        
    }

    public function store()
    {
        $model = new ClientseModel();

        $userId = session()->get('user_id');

        // Vérifiez si l'enregistrement existe déjà
        $existingData = $model->where('user_id', $userId)->first();
        // Récupérer les données du formulaire et les stocker dans $data
        $data = [
            'user_id' => $userId,
            'principaux_clients' => $this->request->getPost('principaux_clients'),
            'exemple_projets' => $this->request->getPost('exemple_projets'),
        ];

        // Valider les données (ajoutez votre logique de validation ici)

        if ($existingData) {
            // Mettre à jour l'enregistrement existant
            $model->update($existingData['id'], (object)$data);
        } else {
            // Insérer un nouvel enregistrement
            $model->save($data);
        }

        // Rediriger ou afficher un message de succès
        return redirect()->to('/my-informations-contact')->with('message', 'Données enregistrées avec succès.');
    }
}
