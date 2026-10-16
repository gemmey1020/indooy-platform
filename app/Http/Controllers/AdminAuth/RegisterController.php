<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use Auth;

class RegisterController extends Controller
{
	protected $redirectPath = 'Admin_Dashboard';
    public function showRegistrationForm()
    {
    	return view('Admin.auth.register');
    }
    public function register(Request $request)
    {
    	   //Validates data
        $this->validator($request->all())->validate();

       //Create Admin
        $Admin = $this->create($request->all());

        //Authenticates Admin
        $this->guard()->login($Admin);

       //Redirects Admin
        return redirect($this->redirectPath);
    }
     protected function validator(array $data)
    {
        return Validator::make(
        	$data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
     protected function guard()
   {
       return Auth::guard('web_Admin');
   }

}
