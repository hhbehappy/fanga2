<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Fanza;
use App\Services\RubyKeyword;

class FanzaActressController extends Controller
{
    public function actress()
    {
        $actresslists = Fanza::select('content_id', 'title', 'actress', 'updated_at')->whereNotIn('actress', [''])->latest('updated_at')->get()->unique('actress')->take(60);
        
        return Inertia::render('Fanza/Video/Actress/Index',[
            'actresslists' => $actresslists,
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
        
        if(!empty($keyword)){
            $actressnamelists = Fanza::select('content_id', 'title', 'actress', 'ruby', 'updated_at')->Where('ruby', 'like',$keyword. '%')
            ->oldest('ruby')
            ->get()->unique('actress');
        }

        return Inertia::render('Fanza/Video/Actress/Name', [
            'actressnamelists' => $actressnamelists,
            'line' => $line,
            'keyword' => $keyword
        ]);
    }

    public function actress_memo()
    {
        $actressmemolists = DB::table('fanza_release_memos')
            ->select('fanza_release_memos.content_id', 'title', 'actress', DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'actress')->latest('total')
            ->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')
            ->take(100)->get()->unique('actress');

            return Inertia::render('Fanza/Video/Actress/Memo',[
                'actressmemolists' => $actressmemolists,
            ]);
    }

    public function actress_nice()
    {
        $actressnicelists = DB::table('nices')
            ->select('nices.content_id', 'title', 'actress', 'type',DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', 'actress', 'type')->latest('total')
            ->leftJoin('fanzas', 'nices.content_id', '=', 'fanzas.content_id')
            ->take(100)->get()->unique('actress');

        return Inertia::render('Fanza/Video/Actress/Nice',[
            'actressnicelists' => $actressnicelists
        ]);
    }
}
