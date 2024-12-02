<?php

namespace App\Controllers\user;

use CodeIgniter\Controller;

use App\Models\ContactModel;

class InfoContactController extends Controller
{
    public function index()
    {
        $model = new ContactModel();
        
        // Récupérer tous les contacts
        $allContacts = $model->findAll();

        // Passer les données à la vue
        return view('user/info_contact', ['contacts' => $allContacts]);
    }

    public function store()
    {
        $model = new ContactModel();
        $supplierModel = new \App\Models\SupplierModel();
        
        // 1. Récupérer le user_id de l'utilisateur connecté
        $userId = session()->get('user_id');
        
        // 2. Utiliser ce user_id pour trouver le supplier correspondant
        $supplier = $supplierModel->where('user_id', $userId)->first();
        
        // Vérifier si les champs sont vides et s'il existe au moins un contact
        $contactExists = $model->where('supplier_id', $supplier['id'])->first();
        if (empty($this->request->getPost('nom')) && 
            empty($this->request->getPost('prenom')) &&
            empty($this->request->getPost('fonction')) &&
            empty($this->request->getPost('telephone')) &&
            empty($this->request->getPost('email'))) {
            
            if (!$contactExists) {
                return redirect()->back()
                    ->with('error', 'Veuillez remplir les champs requis ou ajouter un contact.');
            }
            return redirect()->to('/user/my-informations-commentaires');
        }

        // 4. Récupérer les données du formulaire avec le supplier_id au lieu du user_id
        $data = [
            'supplier_id' => $supplier['id'], 
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'fonction' => $this->request->getPost('fonction'),
            'telephone' => $this->request->getPost('telephone'),
            'email' => $this->request->getPost('email'),
        ];

        // 5. Insérer un nouvel enregistrement
        $model->save($data);

        return redirect()->to('/user/my-informations-commentaires')->with('message', 'Données enregistrées avec succès.');
    }

    public function delete($id)
    {
        $model = new ContactModel();
        $supplierModel = new \App\Models\SupplierModel();
        $userId = session()->get('user_id');

        // Récupérer le fournisseur connecté
        $supplier = $supplierModel->where('user_id', $userId)->first();

        if (!$supplier) {
            return redirect()->to('/user/my-informations-contact')
                ->with('error', 'Fournisseur non trouvé.');
        }

        // Vérifier que le contact appartient bien au fournisseur
        $contact = $model->where([
            'id' => $id,
            'supplier_id' => $supplier['id']
        ])->first();

        if (!$contact) {
            return redirect()->to('/user/my-informations-contact')
                ->with('error', 'Contact non trouvé ou non autorisé.');
        }

        // Supprimer le contact
        if ($model->delete($id)) {
            return redirect()->to('/user/my-informations-contact')
                ->with('message', 'Contact supprimé avec succès.');
        }

        return redirect()->to('/user/my-informations-contact')
            ->with('error', 'Erreur lors de la suppression du contact.');
    }
}
