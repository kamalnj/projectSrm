<?php

namespace App\Controllers\user;

use CodeIgniter\Controller;

use App\Models\ContactModel;

class InfoContactController extends Controller
{
    public function index()
    {
        $model = new ContactModel();
        $userId = session()->get('user_id');

        // Récupérer les données existantes
        $existingData = $model->where('user_id', $userId)->first();

        // Passer les données à la vue
        return view('user/info_contact', ['data' => $existingData]);
    }

    public function store()
    {

        $model = new ContactModel();

        $userId = session()->get('user_id');

        // Vérifiez si l'enregistrement existe déjà
        $existingData = $model->where('user_id', $userId)->first();
        // Récupérer les données du formulaire
        $data = [
            'user_id' => $userId,
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'fonction' => $this->request->getPost('fonction'),
            'telephone' => $this->request->getPost('telephone'),
            'email' => $this->request->getPost('email'),
        ];

        
        // Insérer un nouvel enregistrement
        $model->save($data);

        // Rediriger ou afficher un message de succès
        return redirect()->to('/my-informations-commentaires')->with('message', 'Données enregistrées avec succès.');
    }
}
