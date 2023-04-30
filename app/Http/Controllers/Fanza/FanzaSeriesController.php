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
            'serieslists' => Fanza::itioshilists('series')
        ]);
    }

    public function series_all()
    {
        $seriesalllists = Fanza::column_all('series');

        return view('Fanza/Video/Series/All', compact('seriesalllists'));
    }

    public function series_search(Request $request)
    {
        $keyword = $request->keyword;
        $seriessearchlists = Fanza::column_search('series', $keyword);

        return view('Fanza/Video/Series/Search', compact('seriessearchlists', 'keyword'));
    }

    public function series_memo()
    {
        return Inertia::render('Fanza/Video/Series/Memo',[
            'seriesmemolists' => FanzaReleaseMemo::memolist('series')
        ]);
    }

    public function series_nice()
    {
        return Inertia::render('Fanza/Video/Series/Nice',[
            'seriesnicelists' => FanzaNice::nicelist('series')
        ]);
    }

}
