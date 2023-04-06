<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Duga;

class DugaSeriesController extends Controller
{
    public function series()
    {
        $serieslists = Duga::select('productid', 'jacketimage', 'posterimage', 'title', 'series', 'updated_at')->whereNotIn('series', [''])->latest('updated_at')->get()->unique('series')->take(60);

        return Inertia::render('Duga/Video/Series/Index', [
            'serieslists' => $serieslists
        ]);
        
    }

    public function series_all()
    {
        $seriesalllists = Duga::groupBy('series')->whereNotIn('series', [''])->oldest('series')->paginate(100);

        return view('Duga/Video/Series/All', compact('seriesalllists'));
    }

    public function series_search(Request $request)
    {
        $keyword = $request->keyword;

        if(!empty($keyword)){
            $seriessearchlists = Duga::where('series', 'like', $keyword . '%')->groupBy('series')->oldest('series')->paginate(100);
        }

        return view('Duga/Video/Series/Search', compact('seriessearchlists', 'keyword'));
    }

    public function series_memo()
    {
        $seriesmemolists = DB::table('duga_release_memos')
            ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'series', DB::raw('count(*) as total'))
            ->groupBy('productid', 're_productid', 'title', 'jacketimage', 'series')->latest('total')
            ->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')
            ->get()->unique('series')->take(100);

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
            ->get()->unique('series')->take(100);

        return Inertia::render('Duga/Video/Series/Nice', [
            'seriesnicelists' => $seriesnicelists
        ]);
    }
}
