<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class SuppliersController extends BaseController
{
    public function index()
    {
        $supplierModel = new SupplierModel();
        $suppliers = $supplierModel->findAll();

        $data = [
            'suppliers' => $suppliers,
        ];

        return view('admin/listSuppliers', $data);
    }

    public function create()
    {
        // Load the request data
        $data = [
            'nom' => $this->request->getPost('nom'),
            'email' => $this->request->getPost('email'),
            'category' => $this->request->getPost('category'),
        ];

        // Validate the input
        if (!$this->validate([
            'nom' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email',
            'category' => 'required|min_length[3]|max_length[255]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Begin transaction
        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            // Save the data to the users table (for login)
            $userModel = new UserModel();
            $password = bin2hex(random_bytes(4)); // Génère un mot de passe aléatoire de 8 caractères (4 bytes)
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $userData = [
                'username' => $data['nom'], // Use email as the username
                'email' => $data['email'],
                'password' => $hashedPassword, // Hash the password
                'role' => 'user', // Assign the supplier role
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $userModel->save($userData);

            // Save the data to the suppliers table
            $supplierModel = new SupplierModel();
            $supplierData = [
                'user_id' => $userModel->insertID(),
                'nom' => $data['nom'],
                'email' => $data['email'],
                'category' => $data['category'],
            ];
            $supplierModel->save($supplierData);

            // If everything is successful, commit the transaction
            if ($db->transStatus() === FALSE) {
                $db->transRollback();
                return redirect()->back()->with('error', 'Failed to add supplier and user.');
            }

            $db->transCommit();

            // Send email to the user with login credentials
            $this->sendSupplierEmail($data['email'], $password);

            // Send a success response to the frontend
            return $this->response->setJSON(['success' => true]);
        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Failed to add supplier and user: ' . $e->getMessage());
        }
    }

    private function sendSupplierEmail($email, $password)
    {
        $emailService = \Config\Services::email();

        $emailService->setFrom('najikamal100@gmail.com', 'Srm');
        $emailService->setTo($email);
        $emailService->setSubject('Welcome to Our Service');

        $message = "Dear Supplier,\n";
        $message .= "Welcome to our system!\n";
        $message .= "Below are your login details:\n";
        $message .= "Email: {$email}\n";
        $message .= "Password: {$password}\n";
        $message .= "Best Regards,\nAppSRM";


        $emailService->setMessage($message);

        // Send email
        if (!$emailService->send()) {
            log_message('error', 'Failed to send email: ' . $emailService->printDebugger());
        } else {
            log_message('info', 'Email sent successfully to: ' . $email);
        }
    }
}
