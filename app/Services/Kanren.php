<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Fanza;
use App\Models\Duga;

class Kanren
{
  public static function fanzaactresss($content_id){

    $videoa = Fanza::whereContent_id($content_id)->first();

    $fanzaactresss = Fanza::where('actress', $videoa->actress)->whereDate('date', '<', Carbon::today())->whereNotIn('content_id', [$content_id])->latest('updated_at')->get()->take(20);

    return $fanzaactresss;
  }

  public static function fanzamakers($content_id){

    $videoa = Fanza::whereContent_id($content_id)->first();

    $fanzamakers = Fanza::where('maker', $videoa->maker)->whereDate('date', '<', Carbon::today())->whereNotIn('content_id', [$content_id])->latest('updated_at')->get()->take(20);

    return $fanzamakers;
  }

  public static function fanzaseriess($content_id){

    $videoa = Fanza::whereContent_id($content_id)->first();

    $fanzaseriess = Fanza::where('series', $videoa->series)->whereDate('date', '<', Carbon::today())->whereNotIn('content_id', [$content_id])->latest('updated_at')->get()->take(20);

    return $fanzaseriess;
  }

  public static function fanzadirectors($content_id){

    $videoa = Fanza::whereContent_id($content_id)->first();

    $fanzadirectors = Fanza::where('director', $videoa->director)->whereDate('date', '<', Carbon::today())->whereNotIn('content_id', [$content_id])->latest('updated_at')->get()->take(20);

    return $fanzadirectors;
  }

  public static function fanzagenre2s($content_id){

    $videoa = Fanza::whereContent_id($content_id)->first();

    $fanzagenre2s = Fanza::where('genre2', $videoa->genre2)->whereDate('date', '<', Carbon::today())->whereNotIn('content_id', [$content_id])->latest('updated_at')->get()->take(20);

    return $fanzagenre2s;
  }

}