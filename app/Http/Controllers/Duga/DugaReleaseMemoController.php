<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDugaReleaseMemoRequest;
use App\Http\Requests\UpdateDugaReleaseMemoRequest;
use App\Models\DugaReleaseMemo;

class DugaReleaseMemoController extends Controller
{
    public function index()
    {
        $releasealllists = DugaReleaseMemo::releaseAllLists();

        return view('Duga/Video/Memo/All', compact('releasealllists'));
    }

    public function store(StoreDugaReleaseMemoRequest $request, $duga_id, $productid)
    {
        DugaReleaseMemo::store($request, $duga_id, $productid);
    }

    public function update(UpdateDugaReleaseMemoRequest $request, $id, $productid)
    {
        DugaReleaseMemo::change($request, $id);

        return to_route('dvideo.show', ['id' => $productid])
        ->with([
            'message' => 'メモを更新しました。',
            'status'  => 'update'
        ]);
    }

    public function destroy($id)
    {
        DugaReleaseMemo::destroy($id);
    }
}
