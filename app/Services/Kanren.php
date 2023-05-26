<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Fanza;
use App\Models\Duga;

class Kanren
{
  public static function fanzaKanren($content_id, $column){

    $videoa = Fanza::whereContent_id($content_id)->first();

    $fanzakanren = Fanza::where($column, $videoa->$column)->whereDate('date', '<', Carbon::today())->whereNotIn('content_id', [$content_id])->latest('updated_at')->get()->take(20);

    return $fanzakanren;
  }
  
  public static function dugaKanren($productid, $column){

    $dugavideo = Duga::whereProductid($productid)->first();

    $dugakanren = Duga::where($column, $dugavideo->$column)->whereNotIn('productid', [$productid])->latest('updated_at')->get()->take(20);

    return $dugakanren;
  }

}