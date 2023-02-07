<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nice;
use App\Models\Fanza;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    public function nice($content_id, $fanza_id, $duga_id, $type){

        $re_productid = str_replace("-", "/", $content_id);

        Nice::create([
            'user_id' => Auth::id(),
            'fanza_id' => $fanza_id,
            'duga_id' => $duga_id,
            'type' => $type,
            'content_id' => $content_id,
            're_productid' => $re_productid
        ]);

        return back()
        ->with([
            'nicemessage' => '気になる動画に登録しました。',
            'status'  => 'nice'
        ]);
    }

    public function unnice($content_id){
        
        $nice=Nice::where('content_id', $content_id)->first();
        $nice->delete();

        return back()
        ->with([
            'nicemessage' => '気になる動画から削除しました。',
            'status'  => 'unnice'
        ]);
    }
}
