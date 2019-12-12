<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RXA;
use Auth;
use App\ItemStock;
use App\User;

class ItemStockController extends Controller
{
  function __construct () {
    $this->config = RXA::loadJson(database_path('config.json'));
  }

  function store (ItemStock $ItemStock, Request $req, $userid = null) {
    if (!$this->isAdmin($userid)) {
      return response(json_encode(['message' => 'not allowed']),400);
    }

    $itemStocks = $ItemStock->where('user_id',$userid)->get();
  
    if (count($itemStocks) < 1)  {
      $req['user_id'] = $userid;
      $ItemStock->create($req->all());
      return response()->json('oke');
    }
  }

  protected function isAdmin ($userid) {
    $auth = Auth::user();
    $User = new User;
    if ($auth->id != $userid && !$User->roleCheck($auth->id, $this->config->adminUser)) {
      return false;
    }
    else {
      return true;
    }
  }
}
