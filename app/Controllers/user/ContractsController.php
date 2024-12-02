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
        
        // Récupérer l'ID de l'utilisateur connecté
        $userId = session()->get('user_id');
        
        // Récupérer le fournisseur
        $supplier = $supplierModel->where('user_id', $userId)->first();
        
        if (!$supplier) {
            return redirect()->back()->with('error', 'Fournisseur non trouvé.');
        }
        
        // Récupérer le contrat du fournisseur en utilisant where() et first()
        $contract = $contractModel->where('fournisseur_id', $supplier['id'])->first();
        
        return view('user/contracts', [
            'contract' => $contract
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
} 