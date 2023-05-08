<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Duga;
use App\Models\DugaNice;
use App\Models\DugaReleaseMemo;
use App\Services\RubyKeyword;

class DugaPerformerController extends Controller
{
    public function performer()
    {
        return Inertia::render('Duga/Video/Performer/Index', [
            'performerlists' => Duga::itioshiLists('performer')
        ]);
    }
    
    public function performerRuby()
    {
        return Inertia::render('Duga/Video/Performer/Ruby');
    }

    public function performerName(Request $request)
    {
        $line = $request->line;
        $keyword = RubyKeyword::checkRuby($request->keyword);

        return Inertia::render('Duga/Video/Performer/Name', [
            'performernamelists' => Duga::performerName($keyword),
            'line' => $line,
            'keyword' => $keyword
        ]);
    }

    public function performerMemo()
    {
        return Inertia::render('Duga/Video/Performer/Memo', [
            'performermemolists' => DugaReleaseMemo::memoList('performer')
        ]);
    }

    public function performerNice()
    {
        return Inertia::render('Duga/Video/Performer/Nice', [
            'performernicelists' => DugaNice::niceList('performer')
        ]);
    }
}
