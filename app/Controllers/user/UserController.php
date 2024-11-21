<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        return view('user/dashboard');
    }
}
