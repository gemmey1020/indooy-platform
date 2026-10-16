<?php

namespace App\Http\Controllers\SalesAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Sales;
class RegisterController extends Controller
{
	 protected $redirectPath = 'SalesManager_Dashboard/All_Sales';
  public function showRegistrationForm()
  	{
      return view('Sales.Auth.register');
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
            'email' => 'required|email|max:255|unique:sales',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    protected function create(array $data)
    {
        return Sales::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'salesM_id'=>$data['x'],
            'salesM_name'=>$data['y'],
        ]);
    }
    protected function guard()
   {
       return Auth::guard('web_Sales');
   }



}
