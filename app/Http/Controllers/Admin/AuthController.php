<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function showForgetPassword(){
        return view('admin.auth.forgotpassword');
    }
}
