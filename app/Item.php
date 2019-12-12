<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
  protected $guarded = ['id'];
  protected $hidden = ['created_at','updated_at'];

  public function stocks () {
    return $this->hasMany(ItemStock::class);
  }

  protected static function boot() {
    parent::boot();

    static::creating(function ($item) {
        $item->slug = Str::slug($item->item_name);
    });
  }
}
