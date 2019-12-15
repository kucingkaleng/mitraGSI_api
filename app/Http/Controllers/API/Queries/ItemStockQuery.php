<?php

namespace App\Http\Controllers\API\Queries;

use RXA;
use FTI;
use Validator;
use Image;
use App\Item;
use App\ItemStock;
use App\User;

class ItemStockQuery {
  public function __construct () {

  }

  public static function getAll ($limit = 4) {
    $items = ItemStock::with([
      'item',
      'user:id,name'
    ])->orderByDesc('created_at')->take($limit)->get();
    return $items;
  }

  public static function getAllAndPaginate ($page = 1, $perpage = 4) {
    $skip = ($perpage * $page) - $perpage;
    $count = ItemStock::count();
    $items = ItemStock::with([
      'item',
      'user:id,name'
    ])->orderByDesc('created_at')->skip($skip)->take($perpage)->get();
    return (object) [
      'total' => $count,
      'data' => $items
    ];
  }

  public static function getAllByUserId ($userid, $limit = 4) {
    $items = ItemStock::whereHas('user', function ($q) use ($userid) {
      $q->where('user_id', $userid);
    })->with([
      'item',
      'user:id,name'
    ])->orderByDesc('created_at')->take($limit)->get();
    return $items;
  }

  public static function getOne ($id) {
    $item = ItemStock::with([
      'item',
      'user:id,name'
    ])->where('id', $id)->first();
    return $item;
    // commit
  }

  public static function getOneByUserId ($id, $userid) {
    $item = ItemStock::whereHas('user', function ($q) use ($userid) {
      $q->where('user_id', $userid);
    })->with([
      'item',
      'user:id,name'
    ])->where('id', $id)->first();
    return $item;
  }
}