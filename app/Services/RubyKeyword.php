<?php

namespace App\Services;

class RubyKeyword
{
  public static function checkRuby($ruby){

    if($ruby === 'a'){ $keyword = 'あ';}
    if($ruby === 'i'){ $keyword = 'い';}
    if($ruby === 'u'){ $keyword = 'う';}
    if($ruby === 'e'){ $keyword = 'え';}
    if($ruby === 'o'){ $keyword = 'お';}
    if($ruby === 'ka'){ $keyword = 'か';}
    if($ruby === 'ki'){ $keyword = 'き';}
    if($ruby === 'ku'){ $keyword = 'く';}
    if($ruby === 'ke'){ $keyword = 'け';}
    if($ruby === 'ko'){ $keyword = 'こ';}
    if($ruby === 'sa'){ $keyword = 'さ';}
    if($ruby === 'si'){ $keyword = 'し';}
    if($ruby === 'su'){ $keyword = 'す';}
    if($ruby === 'se'){ $keyword = 'せ';}
    if($ruby === 'so'){ $keyword = 'そ';}
    if($ruby === 'ta'){ $keyword = 'た';}
    if($ruby === 'ti'){ $keyword = 'ち';}
    if($ruby === 'tu'){ $keyword = 'つ';}
    if($ruby === 'te'){ $keyword = 'て';}
    if($ruby === 'to'){ $keyword = 'と';}
    if($ruby === 'na'){ $keyword = 'な';}
    if($ruby === 'ni'){ $keyword = 'に';}
    if($ruby === 'nu'){ $keyword = 'ぬ';}
    if($ruby === 'ne'){ $keyword = 'ね';}
    if($ruby === 'no'){ $keyword = 'の';}
    if($ruby === 'ha'){ $keyword = 'は';}
    if($ruby === 'hi'){ $keyword = 'ひ';}
    if($ruby === 'hu'){ $keyword = 'ふ';}
    if($ruby === 'he'){ $keyword = 'へ';}
    if($ruby === 'ho'){ $keyword = 'ほ';}
    if($ruby === 'ma'){ $keyword = 'ま';}
    if($ruby === 'mi'){ $keyword = 'み';}
    if($ruby === 'mu'){ $keyword = 'む';}
    if($ruby === 'me'){ $keyword = 'め';}
    if($ruby === 'mo'){ $keyword = 'も';}
    if($ruby === 'ya'){ $keyword = 'や';}
    if($ruby === 'yu'){ $keyword = 'ゆ';}
    if($ruby === 'yo'){ $keyword = 'よ';}
    if($ruby === 'ra'){ $keyword = 'ら';}
    if($ruby === 'ri'){ $keyword = 'り';}
    if($ruby === 'ru'){ $keyword = 'る';}
    if($ruby === 're'){ $keyword = 'れ';}
    if($ruby === 'ro'){ $keyword = 'ろ';}
    if($ruby === 'wa'){ $keyword = 'わ';}

    return $keyword;
  }
}