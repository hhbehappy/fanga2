<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Fanza;

class FanzaMakerController extends Controller
{
    public function maker()
    {        
        $makerlists = Fanza::select('content_id', 'title', 'maker', 'updated_at')->whereNotIn('maker', [''])->latest('updated_at')->get()->unique('maker')->take(60);

        return Inertia::render('Fanza/Video/Maker/Index',[
            'makerlists' => $makerlists
        ]);
    }

    public function maker_all()
    {
        $makeralllists = Fanza::groupBy('maker')->whereNotIn('maker', [''])->oldest('maker')->paginate(100);

        return view('Fanza/Video/Maker/All', compact('makeralllists'));
    }

    public function maker_search(Request $request)
    {
        $keyword = $request->keyword;

        if(!empty($keyword)){
            $makersearchlists = Fanza::where('maker', 'like', $keyword . '%')->groupBy('maker')->oldest('maker')->paginate(100);
        }

        return view('Fanza/Video/Maker/Search', compact('makersearchlists', 'keyword'));
    }

    public function maker_memo()
    {
        $makermemolists = DB::table('fanza_release_memos')
            ->select('fanza_release_memos.content_id', 'title', 'maker', DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'maker')->latest('total')
            ->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')
            ->get()->unique('maker')->take(100);

            return Inertia::render('Fanza/Video/Maker/Memo',[
                'makermemolists' => $makermemolists
            ]);
    }

    public function maker_nice()
    {
        $makernicelists = DB::table('nices')
            ->select('nices.content_id', 'title', 'maker', 'type',DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'maker', 'type')->latest('total')
            ->leftJoin('fanzas', 'nices.content_id', '=', 'fanzas.content_id')
            ->get()->unique('maker')->take(100);

        return Inertia::render('Fanza/Video/Maker/Nice',[
            'makernicelists' => $makernicelists
        ]);
    }
}
