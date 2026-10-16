<?php

namespace App\Http\Controllers\WebSite_Creation_Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\WebSiteCreation;
use DB;

use Auth;
class RegisterController extends Controller
{
	 protected $redirectPath = '/WebSite_Creation';

     public function showRegistrationForm()
  {
       $country_list = DB::table('countries')->pluck('name','id');
      return view('Web-site-Creation.auth.register')->with('country_list',$country_list);
  }
 public function register(Request $request)
    {

       //Validates data
        $this->validator($request->all())->validate();
// dd($request->all());
       //Create seller
        $Web_site_creation = $this->create($request->all());

        //Authenticates seller
        $this->guard()->login($Web_site_creation);

       //Redirects sellers
        return redirect($this->redirectPath);
    }

    //Validates user's Input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:web_site_creations',
            'mobile' => 'required|max:15|unique:web_site_creations',
            'password' => 'required|min:6',
        ]);
    }
     protected function create(array $data)
    {

        return WebSiteCreation::create([
            'name' => $data['fullname'],
            'mobile' => $data['mobile'],
            'address' => $data['address'],
            'country' => $data['country'],
            'city' => $data['city'],
            'district' =>$data['city'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected function guard()
   {

       return Auth::guard('web_WebSite_Creation');
   }
}
