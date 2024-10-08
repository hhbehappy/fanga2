<?php

namespace App\Services;

error_reporting(0);

use Illuminate\Support\Facades\Http;

class FanzaCreate
{

  public static function create()
  {
    $request_param = array(
      // 必須項目
      'api_id'        => 'dyAAXUwamNkrWLw2YHQ9',
      'affiliate_id'  => 'maxjpblog-995',
      'site'          => 'FANZA',
      // オプション項目
      'service'       => 'digital',
      'hits'          => '100',
      'offset'        => '',
      'sort'          => '',
      'keyword'       => '-期間限定セール -VR -ゲイ',
      'gte_date'      => '2018-01-01T00:00:00',
      'output'        => 'json',
    );
    $url = "https://api.dmm.com/affiliate/v3/ItemList?";
    // リクエストURL生成
    $first_flag = 1; //ループ初回判定フラグ
    foreach ($request_param as $key => $value) {
      if ($first_flag) {
        $url .= "{$key}={$value}";
        $first_flag = 0;
      } else {
        $url .= "&{$key}={$value}";
      }
    }
    $response = Http::get($url);
    json_decode($response, true);
    $result_datas = [];
    $result_datas = $response['result']['items'];

    foreach ($result_datas as $item) {

      $item_list = array(
        'content_id'         => $item['content_id'],
        'title'              => $item['title'],
        'volume'             => $item['volume'],
        'maker'              => $item['iteminfo']['maker'][0]['name'],
        'label'              => $item['iteminfo']['label'][0]['name'],
        'series'             => $item['iteminfo']['series'][0]['name'],
        'actress'            => $item['iteminfo']['actress'][0]['name'],
        'ruby'               => $item['iteminfo']['actress'][0]['ruby'],
        'director'           => $item['iteminfo']['director'][0]['name'],
        'genre0'             => $item['iteminfo']['genre'][0]['name'],
        'genre1'             => $item['iteminfo']['genre'][1]['name'],
        'genre2'             => $item['iteminfo']['genre'][2]['name'],
        'genre3'             => $item['iteminfo']['genre'][3]['name'],
        'genre4'             => $item['iteminfo']['genre'][4]['name'],
        'genre5'             => $item['iteminfo']['genre'][5]['name'],
        'genre6'             => $item['iteminfo']['genre'][6]['name'],
        'genre7'             => $item['iteminfo']['genre'][7]['name'],
        'genre8'             => $item['iteminfo']['genre'][8]['name'],
        'genre9'             => $item['iteminfo']['genre'][9]['name'],
        'date'               => $item['date'],
        'imageURL_small'     => $item['imageURL']['small'],
        'sampleImageURL'     => $item['sampleImageURL']['sample_s']['image'],
        'sampleMovieURL'     => $item['sampleMovieURL']['size_476_306'],
        'affiliateURL'       => $item['affiliateURL'],
      );

      $post_html = <<< EOM
        <div style="float:left;margin:3px;height:180px;width:7em; font-size:40%;overflow: hidden;">
        <a href="store?content_id={$item_list['content_id']}&title={$item_list['title']}&volume={$item_list['volume']}&date={$item_list['date']}&maker={$item_list['maker']}&label={$item_list['label']}&series={$item_list['series']}&actress={$item_list['actress']}&ruby={$item_list['ruby']}&director={$item_list['director']}&genre={$item_list['genre0']}&genre1={$item_list['genre1']}&genre2={$item_list['genre2']}&genre3={$item_list['genre3']}&genre4={$item_list['genre4']}&genre5={$item_list['genre5']}&genre6={$item_list['genre6']}&genre7={$item_list['genre7']}&genre8={$item_list['genre8']}&genre9={$item_list['genre9']}&affiliateURL={$item_list['affiliateURL']}"><img src="https://pics.dmm.co.jp/digital/video/{$item_list['content_id']}/{$item_list['content_id']}ps.jpg" target="_blank" rel="noopener" style="height:120px;"}"><br>{$item_list['content_id']}<br><br>{$item_list['sampleMovieURL']}<br></a>
        </div>
        EOM;
      // HTML出力
      echo $post_html . "\n";
    }
  }

}
