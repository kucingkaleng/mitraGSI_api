<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RXA;
use FTI;
use Validator;
use Image;
use App\Item;
use App\ItemStock;
use App\User;
use App\Http\Controllers\API\Queries\ItemQuery;

class ItemController extends Controller
{
  function __construct () {
    $this->config = RXA::loadJson(database_path('config.json'));
    $this->par = ['userid' => null, 'stock' => false, 'limit' => 4, 'page' => 1, 'perpage' => 4, 'pagination' => false];
  }

  public function get (Item $item, Request $req) {
    $itemid = $req->get('itemid');
    $userid = $req->get('userid');
    $stock = $req->get('stock');
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

    if (!RXA::empty($stock)) { $this->par['stock'] = $stock; }
    if (!RXA::empty($limit)) { $this->par['limit'] = $limit; }
    if (!RXA::empty($page) && !RXA::empty($perpage)) {
      $this->par['pagination'] = true;
      $this->par['page'] = $page;
      $this->par['perpage'] = $perpage;
    }
    // End init param

    // Get all items
    if (RXA::empty($itemid)) {
      return $this->_getAll($item);
    }

    // Get one item
    if (!RXA::empty($itemid)) {
      return $this->_getOne($item, $itemid);
    }
  }

  protected function _getAll ($model) {
    $par = $this->par;
    $query = new ItemQuery;

    if (!RXA::empty($par['userid'])) {
      $items = $query->getAllByUserId($par['userid'],$par['limit']);
      return $items;
    }

    if (!RXA::empty($par['stock'])) {
      if ($par['pagination']) {
        $items = $query->getAllWithStockAndPaginate($par['page'], $par['perpage']);
        if (count($items) < 1) { return response()->json(['error' => 'Nothing more'], 404); }
        return response($items);
      }

      $items = $query->getAllWithStock($par['limit']);
      return response($items);
    }

    if ($par['pagination']) {
      $items = $query->getAllAndPaginate($par['page'], $par['perpage']);
      if (count($items) < 1) { return response()->json(['error' => 'Nothing more'], 404); }
      return response($items);
    }

    $items = $query->getAll($par['limit']);
    return response($items);
  }

  protected function _getOne ($model, $id) {
    $par = $this->par;

    if (!RXA::empty($par['userid'])) {
      $item = Item::whereHas('stocks', function ($query) use ($par) {
        $query->where('user_id', $par['userid']);
      })->where('id', $id)->first();
      $item->load('stocks');
      return $item;
    }

    if (!RXA::empty($par['stock'])) {
      $item = $model->with('stocks')->where('id', $id)->first();
      return response($item);
    }

    $item = $model->find($id);
    return response($item);
  }

  public function store (Item $item, Request $req) {
    $input = $req->all();
    $fti = new FTI;

    $path = date("DMjY");
    if (!file_exists(public_path('uploads/'.$path))) {
      mkdir(public_path('uploads/'.$path), 0755, true);
    }

    $input['images'] = $fti->bulkUploadImage($req->images,'images',$path);

    $item->create($input);
    return response()->json('ok');
  }

  public function storeValidation ($req) {

  }
}
