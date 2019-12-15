<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemStock extends Model
{
  protected $guarded = ['id'];

  protected $hidden = ['user_id','item_id'];

  public function user () {
    return $this->belongsTo(UserData::class);
  }

  public function item () {
    return $this->belongsTo(Item::class);
  }
}
