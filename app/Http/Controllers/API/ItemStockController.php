<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RXA;
use FTI;
use Auth;
use App\Item;
use App\ItemStock;
use App\User;
use App\Http\Controllers\API\Queries\ItemStockQuery;

class ItemStockController extends Controller
{
  public function __construct () {
    $this->config = RXA::loadJson(database_path('config.json'));
    $this->par = ['userid' => null, 'limit' => 4, 'page' => 1, 'perpage' => 4, 'pagination' => false];
  }
  
  public function get (ItemStock $ItemStock, Request $req) {
    $stockid = $req->get('stockid');
    $userid = $req->get('userid');
    $limit = $req->get('limit');
    $page = $req->get('page');
    $perpage = $req->get('perpage');

    // Init param
    if (!RXA::empty($userid)) {
      $user = new User;
      if ($user->roleCheck($userid, $this->config->sellerUser)) {
        $this->par['userid'] = $userid;
      }
    }

    if (!RXA::empty($limit)) { $this->par['limit'] = $limit; }
    if (!RXA::empty($page) && !RXA::empty($perpage)) {
      $this->par['pagination'] = true;
      $this->par['page'] = $page;
      $this->par['perpage'] = $perpage;
    }
    // End init param

    // Get all items
    if (RXA::empty($stockid)) {
      return $this->_getAll($ItemStock);
    }

    // Get one item
    if (!RXA::empty($stockid)) {
      return $this->_getOne($ItemStock, $stockid);
    }
  }

  protected function _getAll ($model) {
    $par = $this->par;
    $query = new ItemStockQuery;

    if (!RXA::empty($par['userid'])) {
      $items = $query->getAllByUserId($par['userid'],$par['limit']);
      return $items;
    }

    if ($par['pagination']) {
      $items = $query->getAllAndPaginate($par['page'], $par['perpage']);
      if (count($items->data) < 1) { return response()->json(['error' => 'Nothing more'], 404); }
      return response([
        'pagination' => FTI::pageGenerator($par['page'], $par['perpage'], $items->total),
        'data' => $items->data
      ]);
    }

    $items = $query->getAll($par['limit']);
    return response($items);
  }

  protected function _getOne ($model, $id) {
    $par = $this->par;
    $query = new ItemStockQuery;

    if (!RXA::empty($par['userid'])) {
      $item = $query->getOneByUserId($par['userid'], $id);
      return $item;
    }

    $item = $query->getOne($id);
    return response($item);
  }

  public function store (ItemStock $ItemStock, Request $req, $userid = null) {
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
