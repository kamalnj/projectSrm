<?php

namespace App\Controllers\user;
use CodeIgniter\Controller;

use App\Models\CommentaireModel;
use App\Models\SupplierModel;

class InfoCommentaireController extends Controller
{
    public function index()
    {
        $model = new CommentaireModel();
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
        return view('user/info_commentaires', ['data' => $existingData]);
    
    }

    public function store()
    {
        $model = new CommentaireModel();

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
            'commentaire' => $this->request->getPost('commentaire'),
            'remarque' => $this->request->getPost('remarque'),
        ];

        // Valider les données (ajoutez votre logique de validation ici)

        // Enregistrer les données dans la base de données
        
        if ($existingData) {
            // Mettre à jour l'enregistrement existant
            $model->update($existingData['id'], (object)$data);
        } else {
            // Insérer un nouvel enregistrement
            $model->save($data);
        }

        // Retourner une réponse JSON
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Données enregistrées avec succès'
        ]);
    }
} 