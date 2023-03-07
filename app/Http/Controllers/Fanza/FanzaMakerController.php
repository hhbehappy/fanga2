<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Fanza;

class FanzaMakerController extends Controller
{
    public function maker()
    {        
        $makerlists = Fanza::select('content_id', 'title', 'maker', 'updated_at')->latest('updated_at')->get()->unique('maker');

        return Inertia::render('Fanza/Video/Maker/Index',[
            'makerlists' => $makerlists
        ]);
    }

    public function maker_memo()
    {
        $makermemolists = DB::table('fanza_release_memos')
            ->select('fanza_release_memos.content_id', 'title', 'maker', DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'maker')->latest('total')
            ->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')
            ->take(100)->get()->unique('maker');

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
            ->take(100)->get()->unique('maker');

        return Inertia::render('Fanza/Video/Maker/Nice',[
            'makernicelists' => $makernicelists
        ]);
    }
}
