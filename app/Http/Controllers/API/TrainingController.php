<?php

namespace App\Http\Controllers\API;

// Requests
use Illuminate\Http\Request;
// Models
use App\SubCategory;
use App\Training;
// Others
use App\Http\Controllers\Controller;
use Validator;

class TrainingController extends Controller
{

  public function index()
  {
    //
  }

  public function store(Request $req)
  {
    // Validations
    $validation = Validator::make($req->all(), [
      'category' => 'required'
    ]);

    if ($validation->fails()) {
      return response()->json(['errors' => $validation->errors()]);
    };

    // Cek sub kategori apakah satu rumpun dengan parent kategori
    $sub_category = SubCategory::find($req->sub_category);

    if ($sub_category->category_id != $req->category) {
      $res = [
        'errors' => [
          'general' => 'sub category invalid'
        ]
      ];
      return response()->json($res);
    }

    $training = Training::create($req->all());
    return response()->json($res);
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
