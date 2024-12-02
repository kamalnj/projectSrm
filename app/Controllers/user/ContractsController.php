<?php

namespace App\Controllers\user;

use CodeIgniter\Controller;
use App\Models\ContratModel;
use App\Models\SupplierModel;

class ContractsController extends Controller
{
    public function index()
    {
        $contractModel = new ContratModel();
        $supplierModel = new SupplierModel();
        $documentModel = new \App\Models\DocumentModel();
        
        $userId = session()->get('user_id');
        $supplier = $supplierModel->where('user_id', $userId)->first();
        
        if ($supplier) {
            $contract = $contractModel->where('fournisseur_id', $supplier['id'])->first();
            // Vérifier si le contrat signé existe déjà
            $signedContract = $documentModel->where([
                'supplier_id' => $supplier['id'],
                'document_type' => 'contrat_signe'
            ])->first();
        }

        return view('user/contracts', [
            'contract' => $contract ?? null,
            'signedContract' => $signedContract ?? null
        ]);
    }
    
    public function download($id)
    {
        $contractModel = new ContratModel();
        $supplierModel = new SupplierModel();
        $userId = session()->get('user_id');
        
        // Vérifier que le contrat appartient bien au fournisseur connecté
        $supplier = $supplierModel->where('user_id', $userId)->first();
        $contract = $contractModel->find($id);
        
        if (!$supplier || !$contract || $contract['fournisseur_id'] !== $supplier['id']) {
            return redirect()->back()->with('error', 'Contrat non trouvé ou accès non autorisé.');
        }
        
        // Vérifier que le fichier existe
        if (!file_exists(FCPATH . $contract['pdf_path'])) {
            return redirect()->back()->with('error', 'Fichier non trouvé.');
        }
        
        return $this->response->download(FCPATH . $contract['pdf_path'], null);
    }
    
    public function uploadSigned()
    {
        $documentModel = new \App\Models\DocumentModel();
        $supplierModel = new SupplierModel();
        $userId = session()->get('user_id');
        
        // Récupérer le fournisseur
        $supplier = $supplierModel->where('user_id', $userId)->first();
        
        if (!$supplier) {
            return redirect()->back()->with('error', 'Fournisseur non trouvé.');
        }
        
        // Vérifier si un fichier a été uploadé
        $file = $this->request->getFile('signed_contract');
        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'Veuillez sélectionner un fichier PDF valide.');
        }
        
        if ($file->getExtension() !== 'pdf') {
            return redirect()->back()->with('error', 'Seuls les fichiers PDF sont acceptés.');
        }
        
        // Créer le dossier s'il n'existe pas
        $uploadPath = FCPATH . 'uploads/documents/contracts';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
        
        // Générer un nom unique pour le fichier
        $newName = $file->getRandomName();
        $originalName = $file->getName();
        
        // Déplacer le fichier
        try {
            $file->move($uploadPath, $newName);
            
            // Sauvegarder dans la table documents avec le chemin relatif
            $documentModel->saveOrUpdateDocument(
                $supplier['id'],
                'contrat_signe',
                $originalName,
                'uploads/documents/contracts/' . $newName
            );
            
            // Envoyer un email aux administrateurs
            $userModel = new \App\Models\UserModel();
            $admins = $userModel->where('role', 'admin')->findAll();
            
            foreach ($admins as $admin) {
                $this->sendContractSignedEmail($supplier['email'], $admin['email'], $supplier['nom']);
            }
            
            return redirect()->back()->with('success', 'Le contrat signé a été envoyé avec succès.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'upload du fichier.');
        }
    }

    private function sendContractSignedEmail($supplierEmail, $adminEmail, $supplierName)
    {
        $emailService = \Config\Services::email();

        $emailService->setFrom($supplierEmail);
        $emailService->setTo($adminEmail);
        $emailService->setSubject('Nouveau contrat signé déposé');

        $message = "Cher Admin,\n\n";
        $message .= "Le fournisseur {$supplierName} a déposé son contrat signé.\n";
        $message .= "Vous pouvez maintenant vérifier le document dans le portail administrateur.\n\n";
        $message .= "Email du fournisseur : {$supplierEmail}\n\n";
        $message .= "Cordialement,\nVotre système";

        $emailService->setMessage($message);

        if (!$emailService->send()) {
            log_message('error', 'Échec de l\'envoi de l\'email : ' . $emailService->printDebugger());
        } else {
            log_message('info', 'Email envoyé avec succès à : ' . $adminEmail);
        }
    }
} 