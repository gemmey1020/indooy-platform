<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Authenticatable
{
    protected $fillable = [
      'name', 'email', 'password','salesM_id','salesM_name',
  ];

  //hidden attributes
   protected $hidden = [
       'password', 'remember_token',
   ];
}
