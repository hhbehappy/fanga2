<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFanzaFreeMemoRequest;
use App\Models\FanzaFreeMemo;

class FanzaFreeMemoController extends Controller
{
    public function store(StoreFanzaFreeMemoRequest $request, $fanza_id, $content_id)
    {
        FanzaFreeMemo::store($request, $fanza_id, $content_id);
    }

    public function destroy($id)
    {
        FanzaFreeMemo::destroy($id);
    }
}
