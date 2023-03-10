<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Duga;

class DugaPerformerController extends Controller
{
    public function performer()
    {
        $performerlists = Duga::select('productid', 'jacketimage', 'posterimage', 'title', 'performer', 'updated_at')->latest('updated_at')->take(60)->get()->unique('performer');

        return Inertia::render('Duga/Video/Performer/Index', [
            'performerlists' => $performerlists
        ]);
    }
    
    public function performer_ruby()
    {
        return Inertia::render('Duga/Video/Performer/Ruby');
    }

    public function performer_name(Request $request)
    {
        $keyword = $request->keyword;
        $request->validate([
            'keyword' => 'required'
        ]);
        
        if(!empty($keyword)){
            $performernamelists = Duga::select('productid', 'jacketimage', 'posterimage', 'title', 'performer', 'ruby', 'updated_at')->Where('ruby', 'like',$keyword. '%')
            ->oldest('ruby')
            ->get()->unique('performer');
        }

        return Inertia::render('Duga/Video/Performer/Name', [
            'performernamelists' => $performernamelists,
            'keyword' => $keyword
        ]);
    }

    public function performer_memo()
    {
        $performermemolists = DB::table('duga_release_memos')
            ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'performer', DB::raw('count(*) as total'))
            ->groupBy('productid', 're_productid', 'title', 'jacketimage', 'performer')->latest('total')
            ->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')
            ->take(100)->get()->unique('performer');

        return Inertia::render('Duga/Video/Performer/Memo', [
            'performermemolists' => $performermemolists
        ]);
    }

    public function performer_nice()
    {
        $performernicelists = DB::table('nices')
        ->select('nices.content_id', 're_productid', 'title', 'jacketimage', 'performer', 'type',DB::raw('count(*) as total'))
        ->groupBy('content_id', 're_productid', 'title', 'jacketimage', 'performer', 'type')->latest('total')
        ->leftJoin('dugas', 'nices.content_id', '=', 'dugas.productid')
        ->take(100)->get()->unique('performer');

        return Inertia::render('Duga/Video/Performer/Nice', [
            'performernicelists' => $performernicelists
        ]);
    }
}
