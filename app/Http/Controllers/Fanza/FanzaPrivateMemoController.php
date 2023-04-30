<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFanzaPrivateMemoRequest;
use App\Http\Requests\UpdateFanzaPrivateMemoRequest;
use App\Models\FanzaPrivateMemo;

class FanzaPrivateMemoController extends Controller
{
    public function store(StoreFanzaPrivateMemoRequest $request, $fanza_id, $content_id)
    {
        FanzaPrivateMemo::store($request, $fanza_id, $content_id);
    }

    public function update(UpdateFanzaPrivateMemoRequest $request, $id, $content_id)
    {
        FanzaPrivateMemo::change($request, $id);

        return to_route('fvideo.show', ['id' => $content_id])
        ->with([
            'message' => '非公開メモを更新しました。',
            'status'  => 'update'
        ]);
    }

    public function destroy($id)
    {
        FanzaPrivateMemo::destroy($id);
    }

}
