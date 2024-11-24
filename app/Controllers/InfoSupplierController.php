<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;

class InfoSupplierController extends BaseController
{
    public function view($id)
    {
        $supplierModel = new SupplierModel();

        // Fetch the supplier data using the id from the URL
        $supplier = $supplierModel->find($id);

        // If no supplier found, throw a 404 page not found exception
        if (!$supplier) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Supplier not found");
        }

        // Pass the supplier data to the view
        return view('admin/infosupplier', ['supplier' => $supplier]);
    }
}
