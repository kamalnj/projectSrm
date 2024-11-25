<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContratModel;
use CodeIgniter\HTTP\ResponseInterface;

class ContratController extends BaseController
{
    public function index()
    {
        $contratModel = new ContratModel();
        $contrats = $contratModel->findAll();

        $data = [
            'contrats' => $contrats,
        ];

        return view('admin/listContrats', $data);
    }

    public function deleteContract($id)
{
    $contractModel = new ContratModel();

    // Find the contract
    $contract = $contractModel->find($id);
    if (!$contract) {
        return redirect()->back()->with('error', 'Contrat introuvable.');
    }

    // Delete the file if it exists
    if (file_exists($contract['pdf_path'])) {
        unlink($contract['pdf_path']);
    }

    // Delete the contract record
    if ($contractModel->delete($id)) {
        return redirect()->to('/admin/contracts')->with('success', 'Contrat supprimé avec succès.');
    } else {
        return redirect()->to('/admin/contracts')->with('error', 'Échec de la suppression du contrat.');
    }
}

}
