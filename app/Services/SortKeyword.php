<?php

namespace App\Services;

class SortKeyword
{
  public static function listSort($sort){

    if($sort === 'actress'){ $sort = 'AV女優';}
    if($sort === 'performer'){ $sort = 'AV女優';}
    if($sort === 'genre'){ $sort = 'ジャンル';}
    if($sort === 'situation'){ $sort = 'シチュエーション';}
    if($sort === 'type'){ $sort = 'タイプ';}
    if($sort === 'costume'){ $sort = 'コスチューム';}
    if($sort === 'play'){ $sort = 'プレイ';}
    if($sort === 'others'){ $sort = 'ジャンル';}
    if($sort === 'category'){ $sort = 'カテゴリ';}
    if($sort === 'maker'){ $sort = 'AVメーカー';}
    if($sort === 'label'){ $sort = 'レーベル';}
    if($sort === 'series'){ $sort = 'シリーズ';}
    if($sort === 'director'){ $sort = '監督';}

    return $sort;
  }
}