<?php

namespace App\Http\Controllers\Duga;

error_reporting(0);

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Duga;
use App\Models\DugaFreeMemo;
use App\Models\DugaReleaseMemo;
use App\Models\DugaPrivateMemo;
use App\Models\Nice;
use App\Services\Kanren;

class DugaVideoController extends Controller
{

    public function create(){

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
            'offset'        => '',
            'keyword'       => '-ゲイ',
            );
            $url = "http://affapi.duga.jp/search?";
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
            $result_data = $response['items'];

            foreach( $result_data as $item ){

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
                <div style="float:left;margin:8px;height:110px;width:7em;font-size:40%">
                <a href="store?productid={$item_list['productid']}&title={$item_list['title']}&caption={$item_list['caption']}&jacketimage={$item_list['jacketimage']}&posterimage={$item_list['posterimage']}&thumbnail01={$item_list['thumbnail01']}&thumbnail02={$item_list['thumbnail02']}&thumbnail03={$item_list['thumbnail03']}&thumbnail04={$item_list['thumbnail04']}&thumbnail05={$item_list['thumbnail05']}&thumbnail06={$item_list['thumbnail06']}&thumbnail07={$item_list['thumbnail07']}&thumbnail08={$item_list['thumbnail08']}&thumbnail09={$item_list['thumbnail09']}&thumbnail10={$item_list['thumbnail10']}&maker={$item_list['makername']}&series={$item_list['series']}&performer={$item_list['performer']}&performer_ruby={$item_list['performer_ruby']}&director={$item_list['director']}&affiliateurl={$item_list['affiliateurl']}&date={$item_list['opendate']}&volume={$item_list['volume']}&label={$item_list['label']}&category={$item_list['category']}"><img src="{$item_list['posterimage']}" /><br>{$item_list['productid']}</a>
                
                </div>
                EOM;
                // HTML出力
                echo $post_html."\n";
            }
    }

    public function store(Request $request)
    {
        $performer_ruby = mb_convert_kana($request->get('performer_ruby'),'H','utf-8');
        
        Duga::updateOrCreate(
            ['productid'        => $request->get('productid')],
            ['productid'        => $request->get('productid'),
            'title'             => $request->get('title'),
            'caption'           => $request->get('caption'),
            'volume'            => $request->get('volume'),
            'maker'             => $request->get('maker'),
            'label'             => $request->get('label'),
            'series'            => $request->get('series'),
            'performer'         => $request->get('performer'),
            'ruby'              => $performer_ruby,
            'director'          => $request->get('director'),
            'category'          => $request->get('category'),
            'affiliateurl'      => $request->get('affiliateurl'),
            'jacketimage'       => $request->get('jacketimage'),
            'posterimage'       => $request->get('posterimage'),
            'thumbnail01'       => $request->get('thumbnail01'),
            'thumbnail02'       => $request->get('thumbnail02'),
            'thumbnail03'       => $request->get('thumbnail03'),
            'thumbnail04'       => $request->get('thumbnail04'),
            'thumbnail05'       => $request->get('thumbnail05'),
            'thumbnail06'       => $request->get('thumbnail06'),
            'thumbnail07'       => $request->get('thumbnail07'),
            'thumbnail08'       => $request->get('thumbnail08'),
            'thumbnail09'       => $request->get('thumbnail09'),
            'thumbnail10'       => $request->get('thumbnail10'),
            'date'              => $request->get('date')
        ]);

        return back();
        
    }

    public function show($productid)
    {

        $dugavideo = Duga::whereProductid($productid)->first();
        $productid_1 = Duga::findOrFail($productid);
        
        return Inertia::render('Duga/Video', [
            'dugavideo'         => $dugavideo,
            'dugavideos'        => Duga::find($productid_1),
            'date'              => $dugavideo->date->format('Y/m/d'),
            're_productid'      => str_replace("-", "/", $dugavideo->productid),
            'dvideoids'         => Duga::dvideoids(),
            'dugaperformers'    => Kanren::dugaperformers($productid),
            'dugaperformercount'=> Kanren::dugaperformers($productid)->count(),
            'dugamakers'        => Kanren::dugamakers($productid),
            'dugamakercount'    => Kanren::dugamakers($productid)->count(),
            'dugaseriess'       => Kanren::dugaseriess($productid),
            'dugaseriescount'   => Kanren::dugaseriess($productid)->count(),
            'dugadirectors'     => Kanren::dugadirectors($productid),
            'dugadirectorcount' => Kanren::dugadirectors($productid)->count(),
            'dugacategorys'     => Kanren::dugacategorys($productid),
            'dugacategorycount' => Kanren::dugacategorys($productid)->count(),
            'duga_free_memos'   => DugaFreeMemo::duga_free_memos($productid),
            'duga_release_memos'=> DugaReleaseMemo::duga_release_memos($productid),
            'mylists'           => DugaReleaseMemo::mylists(),
            'mylistcount'       => DugaReleaseMemo::mylists()->count(),
            'releaselists'      => DugaReleaseMemo::releaselists(),
            'duga_private_memos'=> DugaPrivateMemo::duga_private_memos($productid),
            'privatememolimit'  => DugaPrivateMemo::privatememolimit($productid),
            'auth_id'           => Auth::id(),
            'nice'              => Nice::duganice($productid),
            'nicecount'         => Nice::duganicecount($productid),
        ]);
    }

    public function edit($type, $productid, $memoid)
    {
        
        $dugavideo = Duga::whereProductid($productid)->first();
        $productid_1 = Duga::findOrFail($productid);

        return Inertia::render('Duga/Video/Edit', [
            'type' => $type, // privatememoかreleasememoか判断
            // 'title' => $dugavideo->title,
            'dugavideoa' => $dugavideo,
            'dugavideos' => Duga::find($productid_1),
            'date' => $dugavideo->date->format('Y/m/d'), 
            // 'duga_id'           => $dugavideo->id,
            // 'productid' => $dugavideo->productid,
            're_productid' => str_replace("-", "/", $dugavideo->productid),
            'duga_release_memos' => DugaReleaseMemo::edit_release_memos($memoid),
            'duga_private_memos' => DugaPrivateMemo::edit_private_memos($memoid),
            'update_release_id'  => DugaReleaseMemo::whereId($memoid)->first(),
            'update_private_id'  => DugaPrivateMemo::whereId($memoid)->first(),
            'auth_id'            => Auth::id(),
            'nice'               => Nice::duganice($productid),
            'nicecount'          => Nice::duganicecount($productid)
        ]);
    }
}
