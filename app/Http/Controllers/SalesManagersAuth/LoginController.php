<?php

namespace App\Http\Controllers\SalesManagersAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/SalesManager_Dashboard';

     protected function guard()
   	 {
      return Auth::guard('web_SalesManagers');
    	}
     public function showLoginForm()
  	 {
       return view('SalesManagers.auth.login');
 	  }
   public function logout()
    {
      Auth::guard('web_SalesManagers')->logout();
  return redirect('/SalesManagers_login');
	}
}