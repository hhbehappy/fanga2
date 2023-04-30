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
            'actresslists' => Fanza::itioshilists('actress')
        ]);
    }

    public function actress_ruby()
    {
        return Inertia::render('Fanza/Video/Actress/Ruby');
    }

    public function actress_name(Request $request)
    {
        $line = $request->line;
        $keyword = RubyKeyword::checkRuby($request->keyword);

        return Inertia::render('Fanza/Video/Actress/Name', [
            'actressnamelists' => Fanza::actress_name($keyword),
            'line' => $line,
            'keyword' => $keyword
        ]);
    }

    public function actress_memo()
    {
        return Inertia::render('Fanza/Video/Actress/Memo',[
            'actressmemolists' => FanzaReleaseMemo::memolist('actress')
        ]);
    }

    public function actress_nice()
    {
        return Inertia::render('Fanza/Video/Actress/Nice',[
            'actressnicelists' => FanzaNice::nicelist('actress')
        ]);
    }
}
