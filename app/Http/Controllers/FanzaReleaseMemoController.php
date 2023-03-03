<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFanzaReleaseMemoRequest;
use App\Http\Requests\UpdateFanzaReleaseMemoRequest;
use App\Models\FanzaReleaseMemo;
use App\Models\Fanza;

class FanzaReleaseMemoController extends Controller
{
    public function store(StoreFanzaReleaseMemoRequest $request, $fanza_id, $content_id)
    {
        $fanza = FANZA::find($content_id);
        $fanza->touch();

        FanzaReleaseMemo::create([
            'user_id'      => Auth::id(),
            'name'         => Auth::user()->name,
            'nickname'     => $request->get('nickname'),
            'fanza_id'     => $fanza_id,
            'content_id'   => $content_id,
            'release'      => $request->get('release')
        ]);

        return back()
        ->with([
            'message' => '公開メモを送信しました。',
            'status'  => 'store'
        ]);
    }

    public function update(UpdateFanzaReleaseMemoRequest $request, $id, $content_id)
    {
        
        $releasememo = FanzaReleaseMemo::findOrFail($id);

        $releasememo->update([
            'nickname'    => $request->get('nickname'),
            'release'     => $request->get('release')
        ]);

        return to_route('fvideo.show', ['id' => $content_id])
        ->with([
            'message' => '公開メモを更新しました。',
            'status'  => 'update'
        ]);
    }

    public function destroy($id)
    {
        
        $release_memo = FanzaReleaseMemo::findOrFail($id);
        $release_memo->delete();

        return back()
        ->with([
            'message' => '公開メモを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
