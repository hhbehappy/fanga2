<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDugaPrivateMemoRequest;
use App\Http\Requests\UpdateDugaPrivateMemoRequest;
use App\Models\DugaPrivateMemo;

class DugaPrivateMemoController extends Controller
{
    public function store(StoreDugaPrivateMemoRequest $request, $duga_id, $productid)
    {
        // dd($duga_id);
        $re_productid = str_replace("-", "/", $productid);

        DugaPrivateMemo::create([
            'user_id'      => Auth::id(),
            'name'         => Auth::user()->name,
            'duga_id'      => $duga_id,
            'productid'    => $productid,
            're_productid' => $re_productid,
            'private'      => $request->get('private')
        ]);

        return back()
        ->with([
            'message' => '非公開メモを送信しました。',
            'status'  => 'store'
        ]);
    }

    public function update(UpdateDugaPrivateMemoRequest $request, $id, $productid)
    {
        
        $privatememo = DugaPrivateMemo::findOrFail($id);

        $privatememo->update([
            'private'     => $request->get('private')
        ]);

        return to_route('dvideo.show', ['id' => $productid])
        ->with([
            'message' => '公開メモを更新しました。',
            'status'  => 'update'
        ]);
    }

    public function destroy($id)
    {
        
        $free_memo = DugaPrivateMemo::findOrFail($id);
        $free_memo->delete();

        return back()
        ->with([
            'message' => '非公開メモを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
