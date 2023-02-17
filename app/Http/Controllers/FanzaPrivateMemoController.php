<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFanzaPrivateMemoRequest;
use App\Http\Requests\UpdateFanzaPrivateMemoRequest;
use App\Models\FanzaPrivateMemo;

class FanzaPrivateMemoController extends Controller
{
    public function store(StoreFanzaPrivateMemoRequest $request, $fanza_id, $content_id)
    {
        FanzaPrivateMemo::create([
            'user_id'      => Auth::id(),
            'name'         => Auth::user()->name,
            'fanza_id'     => $fanza_id,
            'content_id'   => $content_id,
            'private'      => $request->get('private')
        ]);

        return back()
        ->with([
            'message' => '非公開メモを送信しました。',
            'status'  => 'store'
        ]);
    }

    public function update(UpdateFanzaPrivateMemoRequest $request, $id, $content_id)
    {
        
        $privatememo = FanzaPrivateMemo::findOrFail($id);

        $privatememo->update([
            'private'     => $request->get('private')
        ]);

        return to_route('fvideo.show', ['id' => $content_id])
        ->with([
            'message' => '非公開メモを更新しました。',
            'status'  => 'update'
        ]);
    }

    public function destroy($id)
    {
        
        $private_memo = FanzaPrivateMemo::findOrFail($id);
        $private_memo->delete();

        return back()
        ->with([
            'message' => '非公開メモを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
