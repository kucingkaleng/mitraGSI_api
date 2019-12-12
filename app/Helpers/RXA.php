<?php

namespace App\Helpers;

/**
 * 29/11/2019
 * Written by Adeardo Dora Harnanda
 * 
 * This App is dedicated to My lovable Ratih Galuh Pradewi.
 * RXA is stands for Ratih x Ade.
 */

class RXA {

  public static function uplImageByPath ($image) {

  }

  public static function uplImage ($image) {

  }

  public static function caesar($str, $offset) {
    $encrypted_text = "";
    $offset = $offset % 26;
    if($offset < 0) {
        $offset += 26;
    }
    $i = 0;
    while($i < strlen($str)) {
        $c = strtoupper($str{$i}); 
        if(($c >= "A") && ($c <= 'Z')) {
            if((ord($c) + $offset) > ord("Z")) {
                $encrypted_text .= chr(ord($c) + $offset - 26);
        } else {
            $encrypted_text .= chr(ord($c) + $offset);
        }
      } else {
          $encrypted_text .= " ";
      }
      $i++;
    }
    return $encrypted_text;
  }

  public static function slugify($text)
  {
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);
    if (empty($text)) {
      return 'n-a';
    }
    return $text;
  }

  public static function loadJson ($json_path) {
    $config = file_get_contents($json_path);
    $config = json_decode($config);
    return $config;
  }

  public static function empty ($val) {
    if (in_array($val,['',null])) {
      return true;
    }
    return false;
  }
}