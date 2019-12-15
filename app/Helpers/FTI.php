<?php

namespace App\Helpers;
use Validator;
use Image;
use RXA;

/**
 * 29/11/2019
 * Written by Adeardo Dora Harnanda
 */

class FTI {

  public static function bulkUploadImage ($requestInput, $fileInputName, $uploadPath) {
    $validator = FTI::imageValidation($requestInput,$fileInputName);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'errors' => $validator->getMessageBag()->toArray()
      ], 400);
    }

    $images = [];
    foreach ($requestInput as $x => $image) {
      $imageName = $uploadPath.'\\'.FTI::defaultFileNaming(rand(10,9999)).$x.'.'.$image->getClientOriginalExtension();
      $img = Image::make($image->getPathname());
      $img->save(public_path('uploads\\'.$imageName), 60);
      $images[] = $imageName;
    }

    return implode(',',$images);
  }

  public static function defaultFileNaming ($fileName = 'kucing', $offset = 5) {
    $hashing = time().'-'.str_replace(' ','',RXA::caesar($fileName,$offset));
    return $hashing;
  }

  public static function imageValidation ($requestInput, $fileInputName) {
    $validator = Validator::make(
      $requestInput, [
        $fileInputName.'.*' => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
      ],[
        $fileInputName.'.*.required' => 'Please upload an image',
        $fileInputName.'.*.mimes' => 'Only jpeg,png and bmp images are allowed',
        $fileInputName.'.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
      ]
    );

    return $validator;
  }

  public static function pageGenerator ($page, $perpage, $total) {
    if (RXA::empty($page) || $page == 1) {
      $prev = 0;
    }
    else {
      $prev = $page-1;
    }
    $next = $page+1;
    $pages = ceil($total/$perpage);

    return (object) [
      'page' => (int) $page,
      'perpage' => (int) $perpage,
      'total_page' => $pages,
      'total_item' => $total
    ];
  }
}