<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
  public function allCategory(Request $req)
  {
    $datas = Category::all();
    if (in_array($req->get('sub'),['1','t','true'])) {
      $datas->load('sub_categories');
    }
    return response()->json($datas);
  }

  public function allSubCategory(Request $req)
  {
    $datas = SubCategory::all();
    if (in_array($req->get('cat'),['1','t','true'])) {
      $datas->load('category');
    }
    return response()->json($datas);
  }

  public function store(Request $request)
  {
    //
  }

  public function show($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }
}
