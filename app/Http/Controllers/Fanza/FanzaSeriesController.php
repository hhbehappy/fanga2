<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Fanza;

class FanzaSeriesController extends Controller
{
    public function series()
    {
        $serieslists = Fanza::select('content_id', 'title', 'series', 'updated_at')->latest('updated_at')->get()->unique('series');

        return Inertia::render('Fanza/Video/Series/Index', [
            'serieslists' => $serieslists,
        ]);
    }

    public function series_memo()
    {
        $seriesmemolists = DB::table('fanza_release_memos')
            ->select('fanza_release_memos.content_id', 'title', 'series', DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'series')->latest('total')
            ->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')
            ->take(100)->get()->unique('series');

            return Inertia::render('Fanza/Video/Series/Memo', [
                'seriesmemolists' => $seriesmemolists
            ]);
    }

    public function series_nice()
    {
        $seriesnicelists = DB::table('nices')
            ->select('nices.content_id', 'title', 'series', 'type',DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'series', 'type')->latest('total')
            ->leftJoin('fanzas', 'nices.content_id', '=', 'fanzas.content_id')
            ->take(100)->get()->unique('series');

        return Inertia::render('Fanza/Video/Series/Nice', [
            'seriesnicelists' => $seriesnicelists
        ]);
    }
}
