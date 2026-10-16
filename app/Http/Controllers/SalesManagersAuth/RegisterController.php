<?php

namespace App\Http\Controllers\SalesManagersAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\SalesManagers;
use Auth;

class RegisterController extends Controller
{
	protected $redirectPath = 'Admin_Dashboard/All_Managers';
      public function showRegistrationForm()
  		{
      return view('SalesManagers.auth.register');

		}
      public function register(Request $request)
    {

       //Validates data
        $this->validator($request->all())->validate();

       //Create seller
        $seller = $this->create($request->all());

        //Authenticates seller
        $this->guard()->login($seller);

       //Redirects sellers
        return redirect($this->redirectPath);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:sales_managers',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    protected function create(array $data)
    {
        return SalesManagers::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected function guard()
   {
       return Auth::guard('web_SalesManagers');
   }

}
