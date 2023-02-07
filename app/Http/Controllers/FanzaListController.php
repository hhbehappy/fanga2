<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Models\Fanza;

class FanzaListController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $videoids = Fanza::whereDate('date', '<', $today)->latest('date')->paginate(20);
        $onemonths = Carbon::today()->subMonth(1);


        return view('Fanza/Video/All', compact('videoids', 'onemonths'));
    }

    public function show(Request $request)
    {

        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;

        if(!empty($keyword)){
            $videolists = Fanza::where('maker', 'like', $keyword)
            ->orWhere('label', 'like', $keyword)
            ->orWhere('series', 'like', $keyword)
            ->orWhere('actress', 'like', $keyword)
            ->orWhere('director', 'like', $keyword)
            ->orWhere('genre', 'like', $keyword)
            ->orWhere('genre1', 'like', $keyword)
            ->orWhere('genre2', 'like', $keyword)
            ->orWhere('genre3', 'like', $keyword)
            ->orWhere('genre4', 'like', $keyword)
            ->orWhere('genre5', 'like', $keyword)
            ->orWhere('genre6', 'like', $keyword)
            ->orWhere('genre7', 'like', $keyword)
            ->orWhere('genre8', 'like', $keyword)
            ->orWhere('genre9', 'like', $keyword)
            ->latest('date')
            ->paginate(10);
        }


        return view('Fanza/Video/List', compact('onemonths', 'videolists', 'keyword'));
    }

    public function genre()
    {
        return Inertia::render('Fanza/Video/Genre');
    }

    public function maker()
    {
        $makerlists = DB::table('fanza_release_memos')
            ->select('fanza_release_memos.content_id', 'title', 'maker', DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'maker')->latest('total')
            ->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')
            ->limit(50)->get()->unique('maker');
            
        $makernicelists = DB::table('nices')
            ->select('nices.content_id', 'title', 'maker', 'type',DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'maker', 'type')->latest('total')
            ->leftJoin('fanzas', 'nices.content_id', '=', 'fanzas.content_id')
            ->limit(50)->get()->unique('maker');

        return Inertia::render('Fanza/Video/Maker',[
            'makerlists' => $makerlists,
            'makernicelists' => $makernicelists
        ]);
    }

    public function actress()
    {

        $actresslists = DB::table('fanza_release_memos')
            ->select('fanza_release_memos.content_id', 'title', 'actress', DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'actress')->latest('total')
            ->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')
            ->limit(50)->get()->unique('actress');
            
        $actressnicelists = DB::table('nices')
            ->select('nices.content_id', 'title', 'actress', 'type',DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'actress', 'type')->latest('total')
            ->leftJoin('fanzas', 'nices.content_id', '=', 'fanzas.content_id')
            ->limit(50)->get()->unique('actress');
            

        return Inertia::render('Fanza/Video/Actress',[
            'actresslists' => $actresslists,
            'actressnicelists' => $actressnicelists
        ]);
    }

    public function series()
    {
        $serieslists = DB::table('fanza_release_memos')
            ->select('fanza_release_memos.content_id', 'title', 'series', DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'series')->latest('total')
            ->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')
            ->limit(50)->get()->unique('series');
            
        $seriesnicelists = DB::table('nices')
            ->select('nices.content_id', 'title', 'series', 'type',DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'series', 'type')->latest('total')
            ->leftJoin('fanzas', 'nices.content_id', '=', 'fanzas.content_id')
            ->limit(50)->get()->unique('series');
            

        return Inertia::render('Fanza/Video/Series', [
            'serieslists' => $serieslists,
            'seriesnicelists' => $seriesnicelists
        ]);
    }
}
