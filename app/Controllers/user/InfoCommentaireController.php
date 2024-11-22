<?php

namespace App\Controllers;

use App\Models\CommentaireModel;

class InfoCommentaireController extends BaseController
{
    public function index()
    {
        $model = new CommentaireModel();
        $userId = session()->get('user_id');

        // Récupérer les données existantes
        $existingData = $model->where('user_id', $userId)->first();

        // Passer les données à la vue
        return view('user/info_commentaires', ['data' => $existingData]);
    
    }

    public function store()
    {
        $model = new CommentaireModel();

        $userId = session()->get('user_id');

        // Vérifiez si l'enregistrement existe déjà
        $existingData = $model->where('user_id', $userId)->first();
        // Récupérer les données du formulaire et les stocker dans $data
        $data = [
            'user_id' => $userId,
            'commentaire' => $this->request->getPost('commentaire'),
            'remarque' => $this->request->getPost('remarque'),
        ];

        // Valider les données (ajoutez votre logique de validation ici)

        // Enregistrer les données dans la base de données
        
        if ($existingData) {
            // Mettre à jour l'enregistrement existant
            $model->update($existingData['id'], $data);
        } else {
            // Insérer un nouvel enregistrement
            $model->save($data);
        }

        // Rediriger ou afficher un message de succès
        return redirect()->to('/succes')->with('message', 'Données enregistrées avec succès.');
    }
} 