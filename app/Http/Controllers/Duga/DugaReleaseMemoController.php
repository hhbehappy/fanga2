<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDugaReleaseMemoRequest;
use App\Http\Requests\UpdateDugaReleaseMemoRequest;
use App\Models\DugaReleaseMemo;
use App\Models\Duga;

class DugaReleaseMemoController extends Controller
{
    public function index()
    {
        $releasealllists = DugaReleaseMemo::releasealllists();

        return view('Duga/Video/Memo/All', compact('releasealllists'));
    }

    public function store(StoreDugaReleaseMemoRequest $request, $duga_id, $productid)
    {
        $duga = Duga::find($productid);
        $duga->touch();

        $re_productid = str_replace("-", "/", $productid);

        DugaReleaseMemo::create([
            'user_id'      => Auth::id(),
            'name'         => Auth::user()->name,
            'nickname'     => $request->get('nickname'),
            'duga_id'      => $duga_id,
            'productid'    => $productid,
            're_productid' => $re_productid,
            'release'      => $request->get('release')
        ]);

        return back()
        ->with([
            'message' => '公開メモを送信しました。',
            'status'  => 'store'
        ]);
    }

    public function update(UpdateDugaReleaseMemoRequest $request, $id, $productid)
    {
        
        $releasememo = DugaReleaseMemo::findOrFail($id);

        $releasememo->update([
            'nickname'    => $request->get('nickname'),
            'release'     => $request->get('release')
        ]);

        return to_route('dvideo.show', ['id' => $productid])
        ->with([
            'message' => '公開メモを更新しました。',
            'status'  => 'update'
        ]);
    }

    public function destroy($id)
    {
        
        $free_memo = DugaReleaseMemo::findOrFail($id);
        $free_memo->delete();

        return back()
        ->with([
            'message' => '公開メモを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
