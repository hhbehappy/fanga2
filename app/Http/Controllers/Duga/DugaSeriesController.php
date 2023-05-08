<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Duga;
use App\Models\DugaNice;
use App\Models\DugaReleaseMemo;

class DugaSeriesController extends Controller
{
    public function series()
    {
        return Inertia::render('Duga/Video/Series/Index', [
            'serieslists' => Duga::itioshiLists('series')
        ]); 
    }

    public function seriesAll()
    {
        $seriesalllists = Duga::columnAll('series');

        return view('Duga/Video/Series/all', compact('seriesalllists'));
    }

    public function seriesSearch(Request $request)
    {
        $keyword = $request->keyword;
        $seriessearchlists = Duga::columnSearch('series', $keyword);

        return view('Duga/Video/Series/search', compact('seriessearchlists', 'keyword'));
    }

    public function seriesMemo()
    {
        return Inertia::render('Duga/Video/Series/Memo', [
            'seriesmemolists' => DugaReleaseMemo::memoList('series')
        ]);
    }

    public function seriesNice()
    {
        return Inertia::render('Duga/Video/Series/Nice', [
            'seriesnicelists' => DugaNice::niceList('series')
        ]);
    }
    
}
