<?php

namespace App\Http\Controllers\Fanza;

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
use App\Services\Kanren;

class FanzaVideoController extends Controller
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
            'hits'          => '100',
            'offset'        => '',
            'sort'          => '',
            'keyword'       => '-期間限定セール -VR -ゲイ',
            'output'        => 'json',
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
            'ruby'               => $request->get('ruby'),
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

        return Inertia::render('Fanza/Video', [
            'videoa' => $videoa,
            'date' => $videoa->date->format('Y/m/d'), 
            'videoids' => Fanza::find($content_id_1),
            'fanzaactresss' => Kanren::fanzaactresss($content_id),
            'fanzaactresscount' => Kanren::fanzaactresss($content_id)->count(),
            'fanzamakers' => Kanren::fanzamakers($content_id),
            'fanzamakercount' => Kanren::fanzamakers($content_id)->count(),
            'fanzaseriess' => Kanren::fanzaseriess($content_id),
            'fanzaseriescount' => Kanren::fanzaseriess($content_id)->count(),
            'fanzadirectors' => Kanren::fanzadirectors($content_id),
            'fanzadirectorcount' => Kanren::fanzadirectors($content_id)->count(),
            'fanzagenre2s' => Kanren::fanzagenre2s($content_id),
            'fanzagenre2count' => Kanren::fanzagenre2s($content_id)->count(),
            'fanza_free_memos' => FanzaFreememo::fanza_free_memos($content_id),
            'fanza_release_memos' => FanzaReleasememo::fanza_release_memos($content_id),
            'fanza_private_memos' => FanzaPrivateMemo::fanza_private_memos($content_id),
            'mylists' => FanzaReleaseMemo::mylists(),
            'releaselists' => FanzaReleasememo::releaselists(),
            'auth_id' => Auth::id(),
            'nice' => Nice::nice($content_id),
            'nicecount' => Nice::nicecount($content_id),
            'privatememolimit' => FanzaPrivateMemo::privatememolimit($content_id),
        ]);
    }

    public function edit($type, $content_id, $memoid)
    {
        $videoa = Fanza::whereContent_id($content_id)->first();
        $content_id_1 = Fanza::findOrFail($content_id);

        return Inertia::render('Fanza/Video/Edit', [
            'type' => $type, // privatememoかreleasememoか判断
            'videoa' => $videoa,
            'date' => $videoa->date->format('Y/m/d'),
            'videoids' => Fanza::find($content_id_1),
            'edit_release_memos' => FanzaReleaseMemo::edit_release_memos($memoid),
            'edit_private_memos' => FanzaPrivateMemo::edit_private_memos($memoid),
            'update_release_id' => FanzaReleaseMemo::whereId($memoid)->first(),
            'update_private_id' => FanzaPrivateMemo::whereId($memoid)->first(),
            'user_id' => Auth::id(),
            'nice' => Nice::nice($content_id),
            'nicecount' => Nice::nicecount($content_id),
        ]);
    }

}
