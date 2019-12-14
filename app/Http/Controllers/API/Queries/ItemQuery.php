<?php

namespace App\Http\Controllers\API\Queries;

use RXA;
use FTI;
use Validator;
use Image;
use App\Item;
use App\ItemStock;
use App\User;

class ItemQuery {
  public function __construct () {

  }

  public static function getAll ($limit = 4) {
    $items = Item::orderByDesc('created_at')->take($limit)->get();
    return $items;
  }

  public static function getAllAndPaginate ($page = 1, $perpage = 4) {
    $skip = ($perpage * $page) - $perpage;
    $items = Item::orderByDesc('created_at')->skip($skip)->take($perpage)->get();
    return $items;
  }

  public static function getAllWithStock ($limit = 4) {
    $items = Item::with('stocks')->orderBy('desc')->take($limit)->get();
    return $items;
  }

  public static function getAllWithStockAndPaginate ($page = 1, $perpage = 4) {
    $skip = ($perpage * $page) - $perpage;
    $items = Item::with('stocks')->orderBy('desc')->skip($skip)->take($perpage)->get();
    return $items;
  }

  public static function getAllByUserId ($userid, $limit = 4) {
    $items = Item::whereHas('stocks', function ($query) use ($userid) {
      $query->where('user_id', $userid);
    })->orderBy('desc')->take($limit)->get();
    $items->load('stocks');

    return $items;
  }
}