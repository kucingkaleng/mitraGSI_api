<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class AuthTransformer extends TransformerAbstract
{
  public function transform($item)
  {
    return [
      'id' => $item->id,
      'username' => $item->username,
      'email' => $item->email,
      'role' => $item->role,
      'data' => $item->data
    ];
  }
}
