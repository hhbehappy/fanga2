<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Fanza;
use App\Models\FanzaNice;
use App\Models\FanzaReleaseMemo;
use App\Services\RubyKeyword;

class FanzaActressController extends Controller
{
    public function actress()
    {   
        return Inertia::render('Fanza/Video/Actress/Index',[
            'actresslists' => Fanza::itioshiLists('actress')
        ]);
    }

    public function actressRuby()
    {
        return Inertia::render('Fanza/Video/Actress/Ruby');
    }

    public function actressName(Request $request)
    {
        $line = $request->line;
        $keyword = RubyKeyword::checkRuby($request->keyword);

        return Inertia::render('Fanza/Video/Actress/Name', [
            'actressnamelists' => Fanza::actressName($keyword),
            'line' => $line,
            'keyword' => $keyword
        ]);
    }

    public function actressMemo()
    {
        return Inertia::render('Fanza/Video/Actress/Memo',[
            'actressmemolists' => FanzaReleaseMemo::memoList('actress')
        ]);
    }

    public function actressNice()
    {
        return Inertia::render('Fanza/Video/Actress/Nice',[
            'actressnicelists' => FanzaNice::niceList('actress')
        ]);
    }
}
