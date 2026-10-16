<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
     protected $redirectTo = '/en/Admin_Dashboard';

    protected function guard()
    {
      return Auth::guard('web_Admin');
    }

     public function showLoginForm()
   {
       return view('Admin.auth.login');
       // bcrypt('ma@0166727027');
   }

   public function logout() {
      Auth::guard('web_Admin')->logout();
  return redirect('/en/Admin_login');
}
}
