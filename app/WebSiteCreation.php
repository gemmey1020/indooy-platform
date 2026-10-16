<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\WebSiteCreationResetPasswordNotification;

class WebSiteCreation extends Authenticatable
{
use Notifiable;

	protected $table='web_site_creations';
    protected $fillable = [
      'name','mobile', 'email','avatar','city','country','district','password','address'
  ];

  //hidden attributes
   protected $hidden = [
       'password', 'remember_token','email','mobile'
   ];

     public function sendPasswordResetNotification($token)
  {
      $this->notify(new WebSiteCreationResetPasswordNotification($token));
  }
}
