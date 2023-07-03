<?php

namespace App\Services;

error_reporting(0);

use Illuminate\Support\Facades\Http;

class DugaCreate
{

  public static function create()
  {
    $request_param = array(
      'version'       => '1.2',
      'appid'         => 'gxXIh4C12PFkChuhysWZ',
      'agentid'       => '13153',
      'bannerid'      => '31',
      'format'        => 'json',
      'adult'         => '1',
      'sort'          => 'favorite',
      // オプション項目
      'hits'          => '100',
      'openstt'       => '2018-01-01',
      'offset'        => '',
      'keyword'       => '-ゲイ',
    );
    $url = "http://affapi.duga.jp/search?";
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
    $result_data = [];
    $result_data = $response['items'];

    foreach ($result_data as $item) {

      $item_list = array(
        'productid'    => $item['item']['productid'],
        'title'        => $item['item']['title'],
        'caption'      => $item['item']['caption'],
        'makername'    => $item['item']['makername'],
        'label'        => $item['item']['label'][0]['name'],
        'series'        => $item['item']['series'][0]['name'],
        'performer'        => $item['item']['performer'][0]['data']['name'],
        'performer_ruby'   => $item['item']['performer'][0]['data']['kana'],
        'director'         => $item['item']['director'][0]['data']['name'],
        'affiliateurl' => $item['item']['affiliateurl'],
        'opendate'     => $item['item']['opendate'],
        'volume'       => $item['item']['volume'],
        'category'     => $item['item']['category'][0]['data']['name'],
        'jacketimage'  => $item['item']['jacketimage'][0]['small'],
        'posterimage'  => $item['item']['posterimage'][0]['small'],
        'thumbnail01'  => $item['item']['thumbnail'][0]['image'],
        'thumbnail02'  => $item['item']['thumbnail'][1]['image'],
        'thumbnail03'  => $item['item']['thumbnail'][2]['image'],
        'thumbnail04'  => $item['item']['thumbnail'][3]['image'],
        'thumbnail05'  => $item['item']['thumbnail'][4]['image'],
        'thumbnail06'  => $item['item']['thumbnail'][5]['image'],
        'thumbnail07'  => $item['item']['thumbnail'][6]['image'],
        'thumbnail08'  => $item['item']['thumbnail'][7]['image'],
        'thumbnail09'  => $item['item']['thumbnail'][8]['image'],
        'thumbnail10'  => $item['item']['thumbnail'][9]['image'],
      );

      $post_html = <<< EOM
          <div style="float:left;margin:8px;height:120px;width:7em;font-size:40%">
          <a href="store?productid={$item_list['productid']}&date={$item_list['opendate']}&title={$item_list['title']}&caption={$item_list['caption']}&jacketimage={$item_list['jacketimage']}&posterimage={$item_list['posterimage']}&thumbnail01={$item_list['thumbnail01']}&thumbnail02={$item_list['thumbnail02']}&thumbnail03={$item_list['thumbnail03']}&thumbnail04={$item_list['thumbnail04']}&thumbnail05={$item_list['thumbnail05']}&thumbnail06={$item_list['thumbnail06']}&thumbnail07={$item_list['thumbnail07']}&thumbnail08={$item_list['thumbnail08']}&thumbnail09={$item_list['thumbnail09']}&thumbnail10={$item_list['thumbnail10']}&maker={$item_list['makername']}&series={$item_list['series']}&performer={$item_list['performer']}&performer_ruby={$item_list['performer_ruby']}&director={$item_list['director']}&affiliateurl={$item_list['affiliateurl']}&volume={$item_list['volume']}&label={$item_list['label']}&category={$item_list['category']}"><img src="{$item_list['posterimage']}" /><br>{$item_list['productid']}</a>
          
          </div>
          EOM;
      // HTML出力
      echo $post_html . "\n";
    }
  }
}
