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
            'makerlists' => Fanza::itioshilists('maker')
        ]);
    }

    public function maker_all()
    {
        $makeralllists = Fanza::column_all('maker');

        return view('Fanza/Video/Maker/All', compact('makeralllists'));
    }

    public function maker_search(Request $request)
    {
        $keyword = $request->keyword;
        $makersearchlists = Fanza::column_search('maker', $keyword);
        
        return view('Fanza/Video/Maker/Search', compact('makersearchlists', 'keyword'));
    }

    public function maker_memo()
    {
        return Inertia::render('Fanza/Video/Maker/Memo',[
            'makermemolists' => FanzaReleaseMemo::memolist('maker')
        ]);
    }

    public function maker_nice()
    {
        return Inertia::render('Fanza/Video/Maker/Nice',[
            'makernicelists' => FanzaNice::nicelist('maker')
        ]);
    }

}
