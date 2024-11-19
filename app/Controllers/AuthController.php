<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{   

    public function register()
    {
        return view('auth/register');
    }

    public function doRegister()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'admin', // Default role for new registrations
        ];

        if ($model->save($data)) {
            return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
        }

        return redirect()->back()->with('error', 'Registration failed. Please try again.');
    }
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'isLoggedIn' => true,
            ]);

            return redirect()->to($user['role'] === 'admin' ? '/admin' : '/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid login credentials');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
