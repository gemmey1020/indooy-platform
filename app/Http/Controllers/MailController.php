<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Provider;
use App\User;
class MailController extends Controller
{
    public function sendmail_carear(Request $request)
    {
         $email1 = $request->input('email');//contact@example.invalid //
            $msg        = "
            <h1><img src='".url('/')."/public/img/logo.jpg' /></h1>
                <h4>client inquery </h4>
                <table width='100%' border='1'>
                    <tr>
                        <td>client name <br>"
                        .$request->input('first_name').
                        "</td>
                        <td>client email<br>"
                        .$request->input('email').
                        "</td>

                    </tr>
                </table>
            ";

                Mail::send('emails.send', ['msg' => $msg], function ($message) use ($email1){
                    $message->from($email1, 'contactUS !');
                    $message->to('contact@example.invalid')->subject('استفسار العملاء  !');
                });

            if(count(Mail::failures()) == 0){
          notify()->flash('email sent successfully', 'success');
            return redirect()->back();
        }else{

     notify()->flash('the system  has crashed .. please try again later', 'error');
                return redirect()->back();
            }
    }
    public function get_Mailing_list()
    {
        $mails=User::leftjoin('providers','providers.user_id','users.id')
        ->select('providers.provider','users.*')
        ->orderBy('providers.user_id', 'desc')
        ->groupBy('users.id')

        ->get();
        //dd($mails[1]->provider);
        return view('Admin.Mailing_list')->with('mails',$mails);
    }
    public function login_non_social(Request $request)
    {
        $check=User::where('email',$request->input('email'))->first();
        if(!$check)
        {
        $newACC = new User;
        $newACC->email=$request->input('email');
       $newACC->save();

        auth()->login($newACC);
         notify()->flash('thank you for sign up ', 'success');
            return redirect()->back();

        }
        else
        {

            auth()->login($check);
             notify()->flash('welcome back', 'success');
            return redirect()->back();

        }
    }
}
