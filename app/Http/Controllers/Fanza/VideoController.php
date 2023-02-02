<?php

namespace App\Http\Controllers\Fanza;

error_reporting(0);

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Fanza;

class VideoController extends Controller
{
    public function create()
    {
        $request_param = array(
            // 必須項目
            'api_id'        => 'dyAAXUwamNkrWLw2YHQ9',
            'affiliate_id'  => 'maxjpblog-995',
            'site'          => 'FANZA',
            // オプション項目
            'service'       => 'digital',
            'floor'         => '',
            'hits'          => '100',
            'offset'        => '',
            'sort'          => '',
            'keyword'       => '',
            'cid'           => '',
            'article'       => '',
            'article_id'    => '',
            'gte_date'      => '',
            'lte_date'      => '',
            'mono_stock'    => '',
            'output'        => 'json',
            'callback'      =>'',
            );
            $url = "https://api.dmm.com/affiliate/v3/ItemList?";
            // リクエストURL生成
            $first_flag = 1; //ループ初回判定フラグ
            foreach($request_param as $key => $value) {
            if($first_flag) {
            $url .= "{$key}={$value}";
            $first_flag = 0;
            } else {
            $url .= "&{$key}={$value}";
            }      }
            $response = Http::get($url);
            json_decode($response,true);
            $result_data = [];
            $result_data = $response['result']['items'];
            // dd($result_data);

            foreach( $result_data as $item ){
                
                $item_list = array(
                    'content_id'         => $item['content_id'], 
                    'title'              => $item['title'], 
                    'volume'             => $item['volume'], 
                    'maker'              => $item['iteminfo']['maker'][0]['name'], 
                    'label'              => $item['iteminfo']['label'][0]['name'], 
                    'series'             => $item['iteminfo']['series'][0]['name'], 
                    'actress'            => $item['iteminfo']['actress'][0]['name'], 
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
                    'affiliateURL'       => $item['affiliateURL'], 
                );
                // dd($item_list['content_id']);
                // dd($item_list['genre3']);
                // echo $item_list['maker'];
                // echo $item_list['label'];
                // echo $item_list['series'];
                $post_html = <<< EOM
                <div style="float:left;margin:7px;height:320px;width:20em;font-size:50%">
                <a href="store?content_id={$item_list['content_id']}&title={$item_list['title']}&volume={$item_list['volume']}&date={$item_list['date']}&maker={$item_list['maker']}&label={$item_list['label']}&series={$item_list['series']}&actress={$item_list['actress']}&director={$item_list['director']}&genre={$item_list['genre0']}&genre1={$item_list['genre1']}&genre2={$item_list['genre2']}&genre3={$item_list['genre3']}&genre4={$item_list['genre4']}&genre5={$item_list['genre5']}&genre6={$item_list['genre6']}&genre7={$item_list['genre7']}&genre8={$item_list['genre8']}&genre9={$item_list['genre9']}&affiliateURL={$item_list['affiliateURL']}"><img src="{$item_list['imageURL_small']}" target="_blank" rel="noopener"}"><br>{$item_list['content_id']}<br>{$item_list['genre0']}<br>{$item_list['genre1']}<br>{$item_list['genre2']}<br>{$item_list['genre3']}<br>{$item_list['genre4']}<br>{$item_list['genre5']}<br>{$item_list['genre6']}<br>{$item_list['genre7']}<br>{$item_list['genre8']}<br>{$item_list['genre9']}<br></a>
                </div>
                EOM;
                // HTML出力
                echo $post_html."\n";
            }
    }

    public function store(Request $request)
    {
        // dd($request->get('content_id'));
        Fanza::updateOrCreate(
            ['fanza_id'        => $request->get('content_id')],
            ['fanza_id'        => $request->get('content_id'),
            'title'              => $request->get('title'),
            'affiliateURL'       => $request->get('affiliateURL'),
            'volume'             => $request->get('volume'),
            'maker'              => $request->get('maker'),
            'label'              => $request->get('label'),
            'series'             => $request->get('series'),
            'actress'            => $request->get('actress'),
            'director'           => $request->get('director'),
            'genre'              => $request->get('genre'),
            'genre1'             => $request->get('genre1'),
            'genre2'             => $request->get('genre2'),
            'genre3'             => $request->get('genre3'),
            'genre4'             => $request->get('genre4'),
            'genre5'             => $request->get('genre5'),
            'genre6'             => $request->get('genre6'),
            'genre7'             => $request->get('genre7'),
            'genre8'             => $request->get('genre8'),
            'genre9'             => $request->get('genre9'),
            'date'               => $request->get('date'),
        ]);

        return back();

    }
}
