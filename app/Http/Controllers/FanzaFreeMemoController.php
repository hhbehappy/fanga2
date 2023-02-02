<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFanzaFreeMemoRequest;
use App\Http\Requests\UpdateFanzaFreeMemoRequest;
use App\Models\FanzaFreeMemo;

class FanzaFreeMemoController extends Controller
{
    public function store(Request $request, $fanza_id, $content_id)
    {
        $request->validate([
            // "fanza_id"   => "required",
            // "free"       => "required | max:500 | min:5",
        ]);
        // dd($content_id);
        FanzaFreeMemo::create([
            'user_id'      => Auth::id(),
            'fanza_id'     => $fanza_id,
            'content_id'   => $content_id,
            'free'         => $request->get('free')
        ]);

        return back()
        ->with([
            'message' => 'メモを送信しました。',
            'status'  => 'store'
        ]);
    }

    public function destroy($id)
    {
        // dd($id);
        $standard_memo = FanzaFreeMemo::findOrFail($id);
        $standard_memo->delete();

        return back()
        ->with([
            'message' => 'フリーメモを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
