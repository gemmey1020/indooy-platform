<?php

namespace App\Http\Controllers\WebSite_Creation_Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
class ForgotPasswordController extends Controller
{
   use SendsPasswordResetEmails;
   	    public function showLinkRequestForm()
    {
        return view('Web-site-Creation.auth.passwords.email');
    }
    public function broker()
    {
         return Password::broker('WebSite_Creation');
    }
}
