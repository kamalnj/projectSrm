<?php

namespace App\Controllers\user;

use CodeIgniter\Controller;
use App\Models\DocumentModel;
use App\Models\ContratModel;
use App\Models\SupplierModel;

class UserController extends Controller
{
    private $documentTypes = [
        'rc', 'attestation_fiscale', 'attestation_cnss', 
        'attestation_rib', 'bilan', 'attestation_identification'
    ];

    public function index()
    {
        $userId = session()->get('user_id');
        $supplierModel = new SupplierModel();
        $documentModel = new DocumentModel();
        $contratModel = new ContratModel();

        $supplier = $supplierModel->where('user_id', $userId)->first();
        
        if (!$supplier) {
            return view('user/dashboard', [
                'documentsProgress' => 0,
                'contractProgress' => 0,
                'informationsProgress' => 0
            ]);
        }

        // Calcul du progrès des documents
        $documents = $documentModel->getSupplierDocuments($supplier['id']);
        $documentsCount = count($documents);
        $documentsProgress = min(($documentsCount / count($this->documentTypes)) * 100, 100);

        // Calcul du progrès du contrat
        $contract = $contratModel->where('fournisseur_id', $supplier['id'])->first();
        $signedContract = $documentModel->where([
            'supplier_id' => $supplier['id'],
            'document_type' => 'contrat_signe'
        ])->first();
        
        $contractProgress = 0;
        if ($contract) $contractProgress = 50;
        if ($signedContract) $contractProgress = 100;

        // Calcul du progrès des informations
        $informationsProgress = min($this->calculateInformationsProgress($supplier), 100);

        return view('user/dashboard', [
            'documentsProgress' => round($documentsProgress),
            'contractProgress' => $contractProgress,
            'informationsProgress' => $informationsProgress
        ]);
    }

    private function calculateInformationsProgress($supplier)
    {
        $requiredFields = [
            'nom', 'email', 'telephone', 'adresse',
            'ville', 'pays', 'code_postal'
        ];

        $completedFields = 0;
        foreach ($requiredFields as $field) {
            if (!empty($supplier[$field])) {
                $completedFields++;
            }
        }

        return round(($completedFields / count($requiredFields)) * 100);
    }
} 
