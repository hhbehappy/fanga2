<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\FanzaNice;
use App\Models\FanzaFreeMemo;
use App\Models\FanzaReleaseMemo;
use App\Models\FanzaPrivateMemo;
use App\Models\DugaNice;
use App\Models\DugaFreeMemo;
use App\Models\DugaReleaseMemo;
use App\Models\DugaPrivateMemo;

class MemoCount
{
  public static function fanzaFreeMemo(){
    $fanzafreememo = FanzaFreeMemo::whereUser_id(Auth::id())->select('content_id')->get()->unique('content_id')->count();

    return $fanzafreememo;
  }

  public static function fanzaReleaseMemo(){
    $fanzareleasememo = FanzaReleaseMemo::whereUser_id(Auth::id())->select('content_id')->get()->unique('content_id')->count();

    return $fanzareleasememo;
  }

  public static function fanzaPrivateMemo(){
    $fanzaprivatememo = FanzaprivateMemo::whereUser_id(Auth::id())->select('content_id')->get()->unique('content_id')->count();

    return $fanzaprivatememo;
  }

  public static function dugaFreeMemo(){
    $dugafreememo = DugaFreeMemo::whereUser_id(Auth::id())->select('productid')->get()->unique('productid')->count();

    return $dugafreememo;
  }

  public static function dugaReleaseMemo(){
    $dugareleasememo = DugaReleaseMemo::whereUser_id(Auth::id())->select('productid')->get()->unique('productid')->count();

    return $dugareleasememo;
  }

  public static function dugaPrivateMemo(){
    $dugaprivatememo = DugaPrivateMemo::whereUser_id(Auth::id())->select('productid')->get()->unique('productid')->count();

    return $dugaprivatememo;
  }

  public static function fanzaNice(){
    $fanzanice = FanzaNice::whereUser_id(Auth::id())->select('content_id')->get()->unique('content_id')->count();

    return $fanzanice;
  }

  public static function dugaNice(){
    $duganice = DugaNice::whereUser_id(Auth::id())->select('productid')->get()->unique('productid')->count();

    return $duganice;
  }

}
