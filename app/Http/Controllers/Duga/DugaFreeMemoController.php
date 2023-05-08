<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDugaFreeMemoRequest;
use App\Models\DugaFreeMemo;

class DugaFreeMemoController extends Controller
{
    public function store(StoreDugaFreeMemoRequest $request, $duga_id, $productid)
    {
        DugaFreeMemo::store($request, $duga_id, $productid);
    }

    public function destroy($id)
    {
        DugaFreeMemo::destroy($id);
    }
}
