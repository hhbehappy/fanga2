<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDugaPrivateMemoRequest;
use App\Http\Requests\UpdateDugaPrivateMemoRequest;
use App\Models\DugaPrivateMemo;

class DugaPrivateMemoController extends Controller
{
    public function store(StoreDugaPrivateMemoRequest $request, $duga_id, $productid)
    {
        DugaPrivateMemo::store($request, $duga_id, $productid);
    }

    public function update(UpdateDugaPrivateMemoRequest $request, $id, $productid)
    {
        DugaPrivateMemo::change($request, $id);

        return to_route('dvideo.show', ['id' => $productid])
        ->with([
            'message' => '非公開メモを更新しました。',
            'status'  => 'update'
        ]);
    }

    public function destroy($id)
    {
        DugaPrivateMemo::destroy($id);
    }
}
