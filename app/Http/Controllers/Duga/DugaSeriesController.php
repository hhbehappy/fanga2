<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Duga;

class DugaSeriesController extends Controller
{
    public function series()
    {
        $serieslists = Duga::select('productid', 'jacketimage', 'posterimage', 'title', 'series', 'updated_at')->latest('updated_at')->get()->unique('series');

        return Inertia::render('Duga/Video/Series/Index', [
            'serieslists' => $serieslists
        ]);
        
    }

    public function series_memo()
    {
        $seriesmemolists = DB::table('duga_release_memos')
            ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'series', DB::raw('count(*) as total'))
            ->groupBy('productid', 're_productid', 'title', 'jacketimage', 'series')->latest('total')
            ->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')
            ->take(100)->get()->unique('series');

        return Inertia::render('Duga/Video/Series/Memo', [
            'seriesmemolists' => $seriesmemolists
        ]);
    }

    public function series_nice()
    {
        $seriesnicelists = DB::table('nices')
            ->select('nices.content_id', 're_productid', 'title', 'jacketimage', 'series', 'type',DB::raw('count(*) as total'))
            ->groupBy('content_id', 're_productid', 'title', 'jacketimage', 'series', 'type')->latest('total')
            ->leftJoin('dugas', 'nices.content_id', '=', 'dugas.productid')
            ->take(100)->get()->unique('series');

        return Inertia::render('Duga/Video/Series/Nice', [
            'seriesnicelists' => $seriesnicelists
        ]);
    }
}
