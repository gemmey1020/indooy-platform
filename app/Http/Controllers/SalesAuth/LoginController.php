<?php

namespace App\Http\Controllers\SalesAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
   use AuthenticatesUsers;
   protected $redirectTo = '/Sales_Dashboard';
   protected function guard()
    {
      return Auth::guard('web_Sales');
    }
    public function showLoginForm()
   {
       return view('Sales.Auth.login');
   }
    public function logout()
    {
      Auth::guard('web_Sales')->logout();
  return redirect('/Sales_login');
}
}