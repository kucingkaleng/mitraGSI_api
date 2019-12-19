<?php

use Illuminate\Http\Request;

Route::group([

  'namespace' => 'API',

], function () {

  Route::post('auth/login', 'AuthController@login');
  Route::post('auth/register', 'AuthController@register');
  Route::post('auth/logout', 'AuthController@logout');
  Route::post('auth/refresh', 'AuthController@refresh');
  Route::post('auth/me', 'AuthController@me');

  Route::get('item/get', 'ItemController@get');
  Route::post('item/store', 'ItemController@store');

  Route::get('item/stock/get', 'ItemStockController@get');
  Route::post('item/stock/store/{userid}', 'ItemStockController@store')->middleware('jwt.verify');

  Route::get('tables', function (Request $r) {
    $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table';");
    $array = array_map(function ($i) {
      if (!in_array($i->name,['sqlite_sequence','migrations'])) {
        return $i->name;
      }
    }, $tables);

    $array = implode(',',array_filter($array));
    Artisan::call('iseed --force --clean '.$array);
    return response($array);
  });
});
