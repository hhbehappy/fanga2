<?php

namespace App\Services;

use App\Models\Fanza;
use App\Models\Duga;

class SideBarRandomOrder
{
  public static function fanzagenre(){
    $fanzagenres = collect([
      '4時間以上作品',
      'ハイビジョン',
      '痴女',
      '美少女',
      '中出し',
      '騎乗位',
      '独占配信',
      '単体作品',
      '手コキ',
      '巨乳',
      '美乳',
      'エステ',
      '素人',
      'ナンパ',
      'ごっくん',
      '女優ベスト・総集編',
      'キス・接吻',
      'フェラ',
      'ギャル',
      '家庭教師',
      'パイパン',
      'ニューハーフ',
      'その他フェチ',
      '脚フェチ',
      '顔射',
      'ギリモザ',
    ]);
    $fanzagenre = $fanzagenres->shuffle()->take(6);

    return $fanzagenre;
  }

  public static function fanzaactress(){
    $fanzaactress =  Fanza::select('actress')->whereNotIn('actress', [''])->inRandomOrder()->get()->unique('actress')->take(6);

    return $fanzaactress;
  }

  public static function fanzamaker(){
    $fanzamaker =  Fanza::select('maker')->whereNotIn('maker', [''])->inRandomOrder()->get()->unique('maker')->take(6);

    return $fanzamaker;
  }

  public static function fanzaseries(){
    $fanzaseries =  Fanza::select('series')->whereNotIn('series', [''])->inRandomOrder()->get()->unique('series')->take(6);

    return $fanzaseries;
  }

  public static function dugaCategory(){
    $dugacategorys = collect([
      '素人',
      'ギャル',
      '女優',
      '盗撮',
      '美少女',
      'パンチラ',
      'スカトロ',
      'おしっこ',
      'トイレ',
      '浣腸',
      '辱め',
      '熟女',
      'SM',
      '緊縛',
      '女子校生',
      'コスプレ',
      'レズ',
      'フェチ',
      'おっぱい',
      'お尻',
      'ぽっちゃり',
      'キャットファイト',
      'アナル',
      '妊婦',
      'アニメ',
      'ゲイ',
      'ニューハーフ',
      'シチュエーション',
      '痴漢',
      'ドラマ',
      'オナニー',
      '外国人',
      '企画',
      'M男',
      '女王様',
      '痴女',
      '露出',
      'ロリ系',
      '成人映画',
    ]);
    $dugacategory = $dugacategorys->shuffle()->take(6);

    return $dugacategory;
  }

  public static function dugaSideBar($column){
    $dugasidebar =  Duga::select($column)->whereNotIn($column, [''])->inRandomOrder()->get()->unique($column)->take(6);

    return $dugasidebar;
  }
  
}