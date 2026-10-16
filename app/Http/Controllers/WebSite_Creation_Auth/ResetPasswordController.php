<?php

namespace App\Http\Controllers\WebSite_Creation_Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    protected $redirectTo = '/en/WebSite_Creation';
        public function showResetForm(Request $request, $token = null)
    {
        return view('Web-site-Creation.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
        public function broker()
    {
        return Password::broker('WebSite_Creation');
    }

    //returns authentication guard of seller
    protected function guard()
    {
        return Auth::guard('web_WebSite_Creation');
    }
}
