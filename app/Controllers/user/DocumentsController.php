<?php

namespace App\Controllers\user;

use CodeIgniter\Controller;
use App\Models\DocumentModel;
use App\Models\SupplierModel;

class DocumentsController extends Controller
{
    private $documentTypes = [
        'rc' => 'RC',
        'attestation_fiscale' => 'Attestation régularité fiscale',
        'attestation_cnss' => 'Attestation CNSS',
        'attestation_rib' => 'Attestation RIB',
        'bilan' => 'Bilan des 3 dernières années',
        'attestation_identification' => 'Attestation d\'identification fiscale'
    ];

    public function index()
    {
        $model = new DocumentModel();
        $userId = session()->get('user_id');
        $supplierModel = new SupplierModel();
        $supplier = $supplierModel->where('user_id', $userId)->first();

        if ($supplier) {
            $documents = $model->getSupplierDocuments($supplier['id']);
            return view("user/documents", ['documents' => $documents]);
        }

        return view("user/documents", ['documents' => null]);
    }

    public function upload()
    {
        $model = new DocumentModel();
        $supplierModel = new SupplierModel();

        $userId = session()->get('user_id');
        $supplier = $supplierModel->where('user_id', $userId)->first();

        if (!$supplier) {
            return redirect()->to('/documents')->with('error', 'Fournisseur non trouvé.');
        }

        $files = $this->request->getFiles();
        
        if (empty($files['documents'])) {
            return redirect()->to('/documents')->with('error', 'Aucun fichier sélectionné.');
        }

        // Vérifier si l'utilisateur a déjà tous les documents requis
        $existingDocuments = $model->getSupplierDocuments($supplier['id']);
        $allDocumentsExist = true;
        
        foreach ($this->documentTypes as $type => $label) {
            if (!isset($existingDocuments[$type])) {
                $allDocumentsExist = false;
                break;
            }
        }

        // Si c'est une première soumission (pas tous les documents présents)
        if (!$allDocumentsExist) {
            // Vérifier que tous les documents requis sont fournis
            $missingDocuments = [];
            foreach ($this->documentTypes as $type => $label) {
                if (!isset($files['documents'][$type]) || !$files['documents'][$type]->isValid()) {
                    $missingDocuments[] = $label;
                }
            }

            if (!empty($missingDocuments)) {
                return redirect()->to('/documents')
                    ->with('error', 'Tous les documents sont obligatoires pour la première soumission. Documents manquants : ' 
                        . implode(', ', $missingDocuments));
            }
        }

        $uploadedFiles = [];
        $errors = [];

        foreach ($files['documents'] as $type => $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                try {
                    $newName = $file->getRandomName();
                    $originalName = $file->getName();
                    $file->move(WRITEPATH . 'uploads', $newName);

                    $model->saveOrUpdateDocument(
                        $supplier['id'],
                        $type,
                        $originalName,
                        'uploads/' . $newName
                    );
                    
                    $uploadedFiles[] = $this->documentTypes[$type];
                } catch (\Exception $e) {
                    $errors[] = "Erreur lors du téléchargement de {$this->documentTypes[$type]}: {$e->getMessage()}";
                }
            }
        }

        if (!empty($errors)) {
            return redirect()->to('/documents')->with('error', implode('<br>', $errors));
        }

        // Vérifier si tous les documents sont présents après l'upload
        $allDocuments = $model->getSupplierDocuments($supplier['id']);
        $allDocumentsUploaded = true;
        
        foreach ($this->documentTypes as $type => $label) {
            if (!isset($allDocuments[$type])) {
                $allDocumentsUploaded = false;
                break;
            }
        }

        // Si tous les documents sont présents, envoyer l'email aux admins
        if ($allDocumentsUploaded) {
            $userModel = new \App\Models\UserModel();
            $admins = $userModel->where('role', 'admin')->findAll();
            
            foreach ($admins as $admin) {
                $this->sendSupplierEmail($supplier['email'], $admin['email']);
            }
        }

        return redirect()->to('/documents')
            ->with('success', 'Documents mis à jour avec succès: ' . implode(', ', $uploadedFiles));
    }

    private function sendSupplierEmail($email, $email_admin)
    {
        $emailService = \Config\Services::email();

        $emailService->setFrom($email);
        $emailService->setTo($email_admin);
        $emailService->setSubject('Nouveaux documents fournisseur');

        $message = "Cher Admin,\n\n";
        $message .= "Je vous informe que j'ai complété mon dossier avec tous les documents requis.\n";
        $message .= "Vous pouvez maintenant vérifier les informations mises à jour.\n\n";
        $message .= "Email du fournisseur : {$email}\n\n";
        $message .= "Cordialement,\nVotre Fournisseur";

        $emailService->setMessage($message);

        if (!$emailService->send()) {
            log_message('error', 'Échec de l\'envoi de l\'email : ' . $emailService->printDebugger());
        } else {
            log_message('info', 'Email envoyé avec succès à : ' . $email_admin);
        }
    }
}
