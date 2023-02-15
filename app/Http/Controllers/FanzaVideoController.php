<?php

namespace App\Http\Controllers;

error_reporting(0);

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Fanza;
use App\Models\FanzaFreeMemo;
use App\Models\FanzaReleaseMemo;
use App\Models\FanzaPrivateMemo;
use App\Models\Nice;

class FanzaVideoController extends Controller
{
    public function memotype(Request $request)
    {
        $id = $request->id;

        return Inertia::render('Fanza/Video/MemoType', [
            'id' => $id
        ]);
    }

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
            'keyword'       => '-VR',
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
            $result_datas = [];
            $result_datas = $response['result']['items'];

            foreach( $result_datas as $item ){
                
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

                $post_html = <<< EOM
                <div style="float:left;margin:7px;height:320px;width:10em; font-size:50%">
                <a href="store?content_id={$item_list['content_id']}&title={$item_list['title']}&volume={$item_list['volume']}&date={$item_list['date']}&maker={$item_list['maker']}&label={$item_list['label']}&series={$item_list['series']}&actress={$item_list['actress']}&director={$item_list['director']}&genre={$item_list['genre0']}&genre1={$item_list['genre1']}&genre2={$item_list['genre2']}&genre3={$item_list['genre3']}&genre4={$item_list['genre4']}&genre5={$item_list['genre5']}&genre6={$item_list['genre6']}&genre7={$item_list['genre7']}&genre8={$item_list['genre8']}&genre9={$item_list['genre9']}&affiliateURL={$item_list['affiliateURL']}"><img src="{$item_list['imageURL_small']}" target="_blank" rel="noopener" style="height:120px;"}"><br>{$item_list['content_id']}<br>{$item_list['genre0']}<br>{$item_list['genre1']}<br>{$item_list['genre2']}<br>{$item_list['genre3']}<br>{$item_list['genre4']}<br>{$item_list['genre5']}<br>{$item_list['genre6']}<br>{$item_list['genre7']}<br>{$item_list['genre8']}<br>{$item_list['genre9']}<br></a>
                </div>
                EOM;
                // HTML出力
                echo $post_html."\n";
            }
    }

    public function store(Request $request)
    {

        Fanza::updateOrCreate(
            ['content_id'        => $request->get('content_id')],
            ['content_id'        => $request->get('content_id'),
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

    public function show($content_id)
    {
        
        $videoa = Fanza::whereContent_id($content_id)->first();
        $content_id_1 = Fanza::findOrFail($content_id);
        $fanza_free_memos = FanzaFreeMemo::whereContent_id($content_id)->latest('updated_at')->get();
        $fanza_release_memos = FanzaReleaseMemo::whereContent_id($content_id)->latest('updated_at')->get();
        $fanza_private_memos = FanzaPrivateMemo::where([['content_id', $content_id], ['user_id', Auth::id()]])->latest('updated_at')->get();
        
        $releaselists = FanzaReleaseMemo::latest('updated_at')->limit(30)->get()->unique('content_id');
        $user_id = Auth::id();
        $nice = Nice::where([['content_id', $content_id], ['user_id', Auth::id()]])->first();
        $nicecount = Nice::whereContent_id($content_id)->count();
        
        
        return Inertia::render('Fanza/Video', [
            'title' => $videoa->title,
            'videoids' => Fanza::find($content_id_1),
            'date' => $videoa->date->format('Y/m/d'), 
            'fanza_id' => $videoa->id,
            'content_id' => $videoa->content_id,
            'fanza_free_memos' => $fanza_free_memos,
            'fanza_release_memos' => $fanza_release_memos,
            'fanza_private_memos' => $fanza_private_memos,
            'releaselists' => $releaselists,
            'user_id' => $user_id,
            'nice' => $nice,
            'nicecount' => $nicecount
        ]);
    }

    public function edit($type, $content_id, $memoid)
    {
        $videoa = Fanza::whereContent_id($content_id)->first();
        $content_id_1 = Fanza::findOrFail($content_id);
        $fanza_release_memos = FanzaReleaseMemo::whereId($memoid)->get();
        $fanza_private_memos = FanzaPrivateMemo::where([['id', $memoid], ['user_id', Auth::id()]])->get();
        $update_release_id = FanzaReleaseMemo::whereId($memoid)->first();
        $update_private_id = FanzaPrivateMemo::whereId($memoid)->first();
        $user_id = Auth::id();
        $nice=Nice::where([['content_id', $content_id], ['user_id', Auth::id()]])->first();
        $nicecount = Nice::whereContent_id($content_id)->count();

        return Inertia::render('Fanza/Video/Edit', [
            'type' => $type, // privatememoかreleasememoか判断
            'title' => $videoa->title,
            'videoids' => Fanza::find($content_id_1),
            'date' => $videoa->date->format('Y/m/d'),
            'fanza_id' => $videoa->id,
            'content_id' => $videoa->content_id,
            'fanza_release_memos' => $fanza_release_memos,
            'fanza_private_memos' => $fanza_private_memos,
            'update_release_id' => $update_release_id,
            'update_private_id' => $update_private_id,
            'user_id' => $user_id,
            'nice' => $nice,
            'nicecount' => $nicecount
        ]);
    }
}
