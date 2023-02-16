<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Models\Duga;

class DugaListController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $videoids = Duga::whereDate('date', '<', $today)->latest('date')->paginate(20);
        $onemonths = Carbon::today()->subMonth(1);
        $auth_id = Auth::id();

        return view('Duga/Video/All', compact('videoids', 'onemonths', 'auth_id'));
    }

    public function show(Request $request)
    {

        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;

        if(!empty($keyword)){
            $videolists = Duga::where('maker', 'like', $keyword)
            ->orWhere('label', 'like', $keyword)
            ->orWhere('series', 'like', $keyword)
            ->orWhere('performer', 'like', $keyword)
            ->orWhere('director', 'like', $keyword)
            ->orWhere('category', 'like', $keyword)
            ->latest('date')
            ->paginate(10);
        }

        return view('Duga/Video/List', [           
            'onemonths' => $onemonths,
            'videolists' => $videolists,   
            'keyword' => $keyword   
        ]);
    }

    public function category()
    {
        return Inertia::render('Duga/Video/Category');
    }

    public function performer()
    {
        $performerlists = DB::table('duga_release_memos')
            ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'performer', DB::raw('count(*) as total'))
            ->groupBy('productid', 're_productid', 'title', 'jacketimage', 'performer')->latest('total')
            ->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')
            ->limit(50)->get()->unique('performer');
            
        $performernicelists = DB::table('nices')
            ->select('nices.content_id', 're_productid', 'title', 'jacketimage', 'performer', 'type',DB::raw('count(*) as total'))
            ->groupBy('content_id', 're_productid', 'title', 'jacketimage', 'performer', 'type')->latest('total')
            ->leftJoin('dugas', 'nices.content_id', '=', 'dugas.productid')
            ->limit(50)->get()->unique('performer');
            

        return Inertia::render('Duga/Video/Performer', [
            'performerlists' => $performerlists,
            'performernicelists' => $performernicelists
        ]);
    }

    public function maker()
    {
        $makerlists = DB::table('duga_release_memos')
            ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'maker', DB::raw('count(*) as total'))
            ->groupBy('productid', 're_productid', 'title', 'jacketimage', 'maker')->latest('total')
            ->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')
            ->limit(50)->get()->unique('maker');
            
            $makernicelists = DB::table('nices')
            ->select('nices.content_id', 're_productid', 'title', 'jacketimage', 'maker', 'type',DB::raw('count(*) as total'))
            ->groupBy('content_id', 're_productid', 'title', 'jacketimage', 'maker', 'type')->latest('total')
            ->leftJoin('dugas', 'nices.content_id', '=', 'dugas.productid')
            ->limit(50)->get()->unique('maker');

        return Inertia::render('Duga/Video/Maker', [
            'makerlists' => $makerlists,
            'makernicelists' => $makernicelists
        ]);

    }

    public function series()
    {
        $serieslists = DB::table('duga_release_memos')
            ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'series', DB::raw('count(*) as total'))
            ->groupBy('productid', 're_productid', 'title', 'jacketimage', 'series')->latest('total')
            ->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')
            ->limit(50)->get()->unique('series');
            
            $seriesnicelists = DB::table('nices')
            ->select('nices.content_id', 're_productid', 'title', 'jacketimage', 'series', 'type',DB::raw('count(*) as total'))
            ->groupBy('content_id', 're_productid', 'title', 'jacketimage', 'series', 'type')->latest('total')
            ->leftJoin('dugas', 'nices.content_id', '=', 'dugas.productid')
            ->limit(50)->get()->unique('series');

        return Inertia::render('Duga/Video/Series', [
            'serieslists' => $serieslists,
            'seriesnicelists' => $seriesnicelists
        ]);
        
    }

    public function destroy($id)
    {
        
        $fanzavideo = Duga::findOrFail($id);
        $fanzavideo->delete();

        return back();

    }
}
