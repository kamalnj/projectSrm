<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientseModel;
use App\Models\CommentaireModel;
use App\Models\CompanyInfoFLRModel;
use App\Models\CompanyModel;
use App\Models\ContactModel;
use App\Models\SupplierModel;

class InfoSupplierController extends BaseController
{
    public function view($id)
    {
        // Load models
        $supplierModel = new SupplierModel();
        $companyModel = new CompanyModel();
        $companyInfoFLRModel = new CompanyInfoFLRModel();
        $clientseModel = new ClientseModel();
        $commentaireModel = new CommentaireModel();
        $contactModel = new ContactModel();

        // Fetch the supplier data using the id
        $supplier = $supplierModel->find($id);

        // If no supplier found, throw a 404 page not found exception
        if (!$supplier) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Supplier not found");
        }

        // Fetch related information from other models
        $infoGenerales = $companyModel->where('supplier_id', $id)->first();
        $informationsFinancieres = $companyInfoFLRModel->where('supplier_id', $id)->first();
        $referencesClients = $clientseModel->where('supplier_id', $id)->findAll();
        $commentairesRemarques = $commentaireModel->where('supplier_id', $id)->findAll();
        $supplierContacts = $contactModel->where('supplier_id', $id)->findAll();

        // Return the view with the data
        return view('admin/infoSupplier', [
            'supplier' => $supplier,
            'supplier_id' => $id, 
            'infoGenerales' => $infoGenerales,
            'informationsFinancieres' => $informationsFinancieres,
            'referencesClients' => $referencesClients,
            'supplierContacts' => $supplierContacts,
            'commentairesRemarques' => $commentairesRemarques,
        ]);
    }

    public function accept($id)
    {
        // Logic to proceed to the next process when the information is accepted
        // Example: Update status, trigger next process, etc.
        // Redirect or pass to another process
        return redirect()->to('admin/suppliers');
    }

    public function reject($id)
    {
        // Get the rejection comment from the form
        $commentaire = $this->request->getPost('commentaire');
        
        // Fetch the supplier's email address from the supplier model
        $supplierModel = new SupplierModel();
        $supplier = $supplierModel->find($id);
        $supplierEmail = $supplier['email'];
        
        // Send the rejection email to the supplier with the provided commentaire
        $this->sendRejectionEmail($supplierEmail, $commentaire);
        
        // Redirect after rejection
        return redirect()->to('admin/suppliers');
    }

    private function sendRejectionEmail($supplierEmail, $commentaire)
    {
        // Create email instance and set up parameters
        $email = \Config\Services::email();

        $email->setFrom('admin@yourapp.com', 'Your App Name');
        $email->setTo($supplierEmail);
        $email->setSubject('Rejection of Supplier Information');
        
        // Compose email body
        $message = "Dear Supplier,\n";
        $message .= "Your supplier information has been rejected due to the following reason:\n";
        $message .= "Reason:" . nl2br(esc($commentaire)) . "\n";
        $message .= "Please verify your information and make the necessary corrections.\n";
        $message .= "Best regards,SRM";

        $email->setMessage($message);
        
        // Send email
        if (!$email->send()) {
            // If email sending fails, log an error or handle it accordingly
            log_message('error', 'Email failed to send.');
        }
    }
}
