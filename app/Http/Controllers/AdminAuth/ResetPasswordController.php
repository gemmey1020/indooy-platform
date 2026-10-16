<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
class ResetPasswordController extends Controller
{
    use ResetsPasswords;
      protected $redirectTo = '//Admin_Dashboard';
    public function showResetForm(Request $request, $token = null)
    {
        return view('Admin.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    public function broker()
    {
        return Password::broker('Admins');
    }

    //returns authentication guard of seller
    protected function guard()
    {
        return Auth::guard('web_Admin');
    }


}
