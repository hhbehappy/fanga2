<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFanzaReleaseMemoRequest;
use App\Http\Requests\UpdateFanzaReleaseMemoRequest;
use App\Models\FanzaReleaseMemo;

class FanzaReleaseMemoController extends Controller
{
    public function index()
    {
        $releasealllists = FanzaReleaseMemo::releasealllists();

        return view('Fanza/Video/Memo/All', compact('releasealllists'));
    }

    public function store(StoreFanzaReleaseMemoRequest $request, $fanza_id, $content_id)
    {
        FanzaReleaseMemo::store($request, $fanza_id, $content_id);
    }

    public function update(UpdateFanzaReleaseMemoRequest $request, $id, $content_id)
    {
        FanzaReleaseMemo::change($request, $id);

        return to_route('fvideo.show', ['id' => $content_id])
        ->with([
            'message' => 'メモを更新しました。',
            'status'  => 'update'
        ]);
    }

    public function destroy($id)
    {
        FanzaReleaseMemo::destroy($id);
    }
}
