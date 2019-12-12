<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
  protected $guarded = ['id'];

  public function users () {
    return $this->hasMany(User::class);
  }

  public function getRulesAttribute ($val) {
    return \json_decode($val);
  }
}
