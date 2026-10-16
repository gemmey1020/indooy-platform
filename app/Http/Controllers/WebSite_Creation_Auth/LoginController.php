<?php

namespace App\Http\Controllers\WebSite_Creation_Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Cookie;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectPath = '/en/WebSite_Creation';
       protected function guard()
    {
      return Auth::guard('web_WebSite_Creation');
    }
       public function showLoginForm()
   {
       return view('Web-site-Creation.auth.login');
   }
      public function logout($id) {
    $data =Auth::guard('web_WebSite_Creation')->user();
    $array_json=json_encode($data);


      //Auth::guard('web_WebSite_Creation')->logout();
      if($id==1){

          return response(view('Web-site-Creation.locked'))->Cookie('saved-datax', $array_json,60);
      }
      elseif($id==0){
        Auth::guard('web_WebSite_Creation')->logout();
          return redirect('/WebSite_Creation/login');
      }

}




}
