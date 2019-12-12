<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemStock extends Model
{
  protected $guarded = ['id'];

  public function user () {
    return $this->belongsTo(User::class);
  }

  public function item () {
    return $this->belongsTo(Item::class);
  }
}
