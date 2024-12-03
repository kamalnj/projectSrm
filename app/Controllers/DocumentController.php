<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DocumentModel;
use App\Models\SupplierModel;

class DocumentController extends BaseController
{
    public function index()
    {
        $supplierModel = new SupplierModel();
        $documentModel = new DocumentModel();

        // Fetch all suppliers
        $suppliers = $supplierModel->findAll();

        // Add associated documents for each supplier
        foreach ($suppliers as &$supplier) {
            $supplier['documents'] = $documentModel
                ->select('file_path, document_type, file_name')
                ->where('supplier_id', $supplier['id'])
                ->findAll();
        }

        $data = [
            'suppliers' => $suppliers,
        ];

        return view('admin/listDocuments', $data);
    }
}
