<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDugaFreeMemoRequest;
use App\Models\DugaFreeMemo;

class DugaFreeMemoController extends Controller
{
    public function store(StoreDugaFreeMemoRequest $request, $duga_id, $productid)
    {
        $re_productid = str_replace("-", "/", $productid);

        DugaFreeMemo::create([
            'user_id'      => Auth::id(),
            'duga_id'      => $duga_id,
            'productid'    => $productid,
            're_productid' => $re_productid,
            'free'         => $request->get('free')
        ]);

        return back()
        ->with([
            'message' => 'フリーメモを送信しました。',
            'status'  => 'store'
        ]);
    }

    public function destroy($id)
    {
        
        $free_memo = DugaFreeMemo::findOrFail($id);
        $free_memo->delete();

        return back()
        ->with([
            'message' => 'フリーメモを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
