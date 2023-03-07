<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFanzaFreeMemoRequest;
use App\Models\FanzaFreeMemo;

class FanzaFreeMemoController extends Controller
{
    public function store(StoreFanzaFreeMemoRequest $request, $fanza_id, $content_id)
    {
        FanzaFreeMemo::create([
            'user_id'      => Auth::id(),
            'fanza_id'     => $fanza_id,
            'content_id'   => $content_id,
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
        
        $free_memo = FanzaFreeMemo::findOrFail($id);
        $free_memo->delete();

        return back()
        ->with([
            'message' => 'フリーメモを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
