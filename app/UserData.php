<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
  protected $table = 'user_datas';
  protected $guarded = ['id'];

  public function user () {
    return $this->hasOne(User::class);
  }
}
