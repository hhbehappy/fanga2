<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Fanza;
use App\Models\Duga;

class Kanren
{
  public static function fanzaActresss($content_id){

    $videoa = Fanza::whereContent_id($content_id)->first();

    $fanzaactresss = Fanza::where('actress', $videoa->actress)->whereDate('date', '<', Carbon::today())->whereNotIn('content_id', [$content_id])->latest('updated_at')->get()->take(20);

    return $fanzaactresss;
  }

  public static function fanzaMakers($content_id){

    $videoa = Fanza::whereContent_id($content_id)->first();

    $fanzamakers = Fanza::where('maker', $videoa->maker)->whereDate('date', '<', Carbon::today())->whereNotIn('content_id', [$content_id])->latest('updated_at')->get()->take(20);

    return $fanzamakers;
  }

  public static function fanzaSeriess($content_id){

    $videoa = Fanza::whereContent_id($content_id)->first();

    $fanzaseriess = Fanza::where('series', $videoa->series)->whereDate('date', '<', Carbon::today())->whereNotIn('content_id', [$content_id])->latest('updated_at')->get()->take(20);

    return $fanzaseriess;
  }

  public static function fanzaDirectors($content_id){

    $videoa = Fanza::whereContent_id($content_id)->first();

    $fanzadirectors = Fanza::where('director', $videoa->director)->whereDate('date', '<', Carbon::today())->whereNotIn('content_id', [$content_id])->latest('updated_at')->get()->take(20);

    return $fanzadirectors;
  }

  public static function fanzaGenre2s($content_id){

    $videoa = Fanza::whereContent_id($content_id)->first();

    $fanzagenre2s = Fanza::where('genre2', $videoa->genre2)->whereDate('date', '<', Carbon::today())->whereNotIn('content_id', [$content_id])->latest('updated_at')->get()->take(20);

    return $fanzagenre2s;
  }
  
  public static function dugaPerformers($productid){

    $dugavideo = Duga::whereProductid($productid)->first();

    $dugaperformers = Duga::where('performer', $dugavideo->performer)->whereNotIn('productid', [$productid])->latest('updated_at')->get()->take(20);

    return $dugaperformers;
  }

  public static function dugaMakers($productid){

    $dugavideo = Duga::whereProductid($productid)->first();

    $dugamakers = Duga::where('maker', $dugavideo->maker)->whereNotIn('productid', [$productid])->latest('updated_at')->get()->take(20);

    return $dugamakers;
  }

  public static function dugaSeriess($productid){

    $dugavideo = Duga::whereProductid($productid)->first();

    $dugaseriess = Duga::where('series', $dugavideo->series)->whereNotIn('productid', [$productid])->latest('updated_at')->get()->take(20);

    return $dugaseriess;
  }

  public static function dugaDirectors($productid){

    $dugavideo = Duga::whereProductid($productid)->first();

    $dugadirectors = Duga::where('director', $dugavideo->director)->whereNotIn('productid', [$productid])->latest('updated_at')->get()->take(20);

    return $dugadirectors;
  }

  public static function dugaCategorys($productid){

    $dugavideo = Duga::whereProductid($productid)->first();

    $dugacategorys = Duga::where('category', $dugavideo->category)->whereNotIn('productid', [$productid])->latest('updated_at')->get()->take(20);

    return $dugacategorys;
  }
}