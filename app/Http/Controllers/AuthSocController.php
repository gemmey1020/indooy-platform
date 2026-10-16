<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use App\Provider;


class AuthSocController extends Controller
{
     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        //dd($user);
        /*

			$user->getId();
			$user->getNickname();
			$user->getName();
			$user->getEmail();
			$user->getAvatar();

        */
        $SelectProvider=Provider::where('provider_id',$user->getId())->first();
        if (!$SelectProvider) {
        							# new user code
        		$userRealForAll = User::where('email',$user->getEmail())->first();
        	if (!$userRealForAll) {
        		$userRealForAll = new User();
	        		if ($user->getName() ==null) {
	        			$userRealForAll->name  = $user->getNickname();
	        		} else {
	        			$userRealForAll->name  = $user->getName();
	        		}


        		$userRealForAll->email = $user->getEmail();
        		$userRealForAll->save();
        	}
        							#create new provider for the new user
        		$newProvider = new Provider();

        		$newProvider->provider_id = $user->getId();
        		$newProvider->provider=$provider;

        		$newProvider->user_id=$userRealForAll->id;
        		$newProvider->Avatar=$user->getAvatar();

        		$newProvider->save();

        }else{
        	$userRealForAll = User::find($SelectProvider->user_id);

        }
        		$newProvider = new Provider();

        		$newProvider->provider_id = $user->getId();
        		$newProvider->provider=$provider;

        		$newProvider->user_id=$userRealForAll->id;
        		$newProvider->Avatar=$user->getAvatar();

        		$newProvider->save();

        auth()->login($userRealForAll);

        return redirect('/');
    }

}
