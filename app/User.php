<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
  use Notifiable;

  protected $guarded = ['id'];

  protected $hidden = [
    'password',
  ];

  public function role () {
    return $this->belongsTo(UserRole::class);
  }

  public function data () {
    return $this->hasOne(UserData::class);
  }

  public function roleCheck ($user_id, Array $checker) {
    $user = $this->with('role')->find($user_id);
    return in_array($user->role->role,$checker);
  }

  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  public function getJWTCustomClaims()
  {
    return [];
  }

  public function setPasswordAttribute($password)
  {
    if ( !empty($password) ) {
      $this->attributes['password'] = bcrypt($password);
    }
  }
}
