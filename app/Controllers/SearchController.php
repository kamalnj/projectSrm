<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class SearchController extends BaseController
{
    public function ajaxSearch()
    {
        if ($this->request->isAJAX()) {
            $searchTerm = $this->request->getPost('search');
            $supplierModel = new SupplierModel();
            
            // Modify the query to match the fields you're searching for
            $suppliers = $supplierModel->like('nom', $searchTerm)
                                       ->orLike('email', $searchTerm)
                                       ->orLike('category', $searchTerm)
                                       ->findAll();

            // Return the results as JSON
            return $this->response->setJSON($suppliers);
        }

        return $this->response->setStatusCode(400, 'Invalid Request');
    }
}
