<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Fanza;
use App\Models\FanzaNice;
use App\Models\FanzaReleaseMemo;

class FanzaMakerController extends Controller
{
    public function maker()
    {        
        return Inertia::render('Fanza/Video/Maker/Index',[
            'makerlists' => Fanza::itioshiLists('maker')
        ]);
    }

    public function makerAll()
    {
        $makeralllists = Fanza::columnAll('maker');

        return view('Fanza/Video/Maker/All', compact('makeralllists'));
    }

    public function makerSearch(Request $request)
    {
        $keyword = $request->keyword;
        $makersearchlists = Fanza::columnSearch('maker', $keyword);
        
        return view('Fanza/Video/Maker/Search', compact('makersearchlists', 'keyword'));
    }

    public function makerMemo()
    {
        return Inertia::render('Fanza/Video/Maker/Memo',[
            'makermemolists' => FanzaReleaseMemo::memoList('maker')
        ]);
    }

    public function makerNice()
    {
        return Inertia::render('Fanza/Video/Maker/Nice',[
            'makernicelists' => FanzaNice::niceList('maker')
        ]);
    }

}
