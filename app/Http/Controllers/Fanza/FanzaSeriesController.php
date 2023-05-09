<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Fanza;
use App\Models\FanzaNice;
use App\Models\FanzaReleaseMemo;

class FanzaSeriesController extends Controller
{
    public function series()
    {
        return Inertia::render('Fanza/Video/Series/Index', [
            'serieslists' => Fanza::itioshiLists('series')
        ]);
    }

    public function seriesAll()
    {
        $seriesalllists = Fanza::columnAll('series');

        return view('Fanza/Video/Series/All', compact('seriesalllists'));
    }

    public function seriesSearch(Request $request)
    {
        $keyword = $request->keyword;
        $seriessearchlists = Fanza::columnSearch('series', $keyword);

        return view('Fanza/Video/Series/Search', compact('seriessearchlists', 'keyword'));
    }

    public function seriesMemo()
    {
        return Inertia::render('Fanza/Video/Series/Memo',[
            'seriesmemolists' => FanzaReleaseMemo::memoList('series')
        ]);
    }

    public function seriesNice()
    {
        return Inertia::render('Fanza/Video/Series/Nice',[
            'seriesnicelists' => FanzaNice::niceList('series')
        ]);
    }

}
