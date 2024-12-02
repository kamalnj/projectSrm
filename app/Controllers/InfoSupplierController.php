<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientseModel;
use App\Models\CommentaireModel;
use App\Models\CompanyInfoFLRModel;
use App\Models\CompanyModel;
use App\Models\ContactModel;
use App\Models\SupplierModel;
use App\Models\ContractModel;
use App\Models\ContratModel;
use Dompdf\Dompdf;
use Dompdf\Options;

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
        $supplierModel = new SupplierModel();
        $contractModel = new ContratModel();
    
        // Retrieve supplier details
        $supplier = $supplierModel->find($id);
        if (!$supplier) {
            return redirect()->back()->with('error', 'Supplier not found.');
        }
    
        // Generate PDF
        $pdfPath = $this->generateContractPDF($supplier);
        if (!$pdfPath) {
            return redirect()->back()->with('error', 'Failed to generate contract PDF.');
        }
    
        // Prepare data for the database
        $contractData = [
            'fournisseur_id' => $id,
            'nom_fournisseur' => $supplier['nom'], 
            'pdf_path' => $pdfPath,
        ];
    
        // Validate and save contract
        if (!empty($contractData['fournisseur_id']) && !empty($contractData['nom_fournisseur']) && !empty($contractData['pdf_path'])) {
            if ($contractModel->save($contractData)) {
                // Send email with contract to supplier
                $this->sendContractEmail($supplier['email'], $supplier['nom']);
    
                // Store success message in session to trigger the modal
                return redirect()->back()->with('success_modal', 'Contract generated and sent successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to save contract data.');
            }
        } else {
            return redirect()->back()->with('error', 'Contract data is incomplete. Please check.');
        }
    }
    
    private function sendContractEmail($email, $name)
{
    $emailService = \Config\Services::email();

    $emailService->setTo($email);
    $emailService->setFrom('admin@yourdomain.com', 'Admin');
    $emailService->setSubject('Contract Ready for Download');
    $emailService->setMessage("
        Bonjour $name,
        Le contrat a été généré et est prêt pour téléchargement. Veuiller rejoindre votre portail.
        Merci,
        Votre équipe.
    ");


    // Send the email
    if (!$emailService->send()) {
        log_message('error', 'Failed to send email to ' . $email . ': ' . $emailService->printDebugger());
    }
}

    

    private function generateContractPDF($supplier)
    {
        // Initialize Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);
    
        // Prepare the HTML content for the contract
        $html = view('admin/contract_template', ['supplier' => $supplier]);
    
        // Load HTML content into dompdf
        $dompdf->loadHtml($html);
    
        // (Optional) Set paper size
        $dompdf->setPaper('A4', 'portrait');
    
        // Render the PDF
        $dompdf->render();
    
        // Get the output (as string)
        $output = $dompdf->output();
    
        // Define the path to save the PDF (store in "public/uploads/contracts/")
        $pdfDirectory = FCPATH . 'uploads/contracts/'; // FCPATH points to the 'public' folder
        if (!is_dir($pdfDirectory)) {
            mkdir($pdfDirectory, 0777, true); // Create directory if it doesn't exist
        }
    
        $pdfFileName = 'contract_' . $supplier['id'] . '_' . time() . '.pdf';
        $pdfFilePath = $pdfDirectory . $pdfFileName;
    
        // Save the file to the server
        file_put_contents($pdfFilePath, $output);
    
        return 'uploads/contracts/' . $pdfFileName; // Return the relative path to the file
    }
    

    // In your controller
    public function downloadContract($contract_id)
    {
        $contractModel = new ContratModel(); // Use the correct model
        $contract = $contractModel->find($contract_id);
    
        if ($contract) {
            $pdfPath = FCPATH . $contract['pdf_path']; // Use FCPATH for the 'public' directory
            if (file_exists($pdfPath)) {
                return $this->response->download($pdfPath, null);
            } else {
                return redirect()->to('/admin/contracts')->with('error', 'The requested contract file does not exist.');
            }
        } else {
            return redirect()->to('/admin/contracts')->with('error', 'Contract record not found.');
        }
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
