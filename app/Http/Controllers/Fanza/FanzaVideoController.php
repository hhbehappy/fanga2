<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Fanza;
use App\Models\FanzaNice;
use App\Models\FanzaFreeMemo;
use App\Models\FanzaReleaseMemo;
use App\Models\FanzaPrivateMemo;
use App\Services\Kanren;
use App\Services\FanzaCreate;

class FanzaVideoController extends Controller
{
    
    public function index()
    {
        return Inertia::render('Fanza/Video/Search', [
            'fvideoids'     => Fanza::fVideoIds(30),
            'fanzacount'    => Fanza::count(),
            'fanzaactresss' => Fanza::fanzaLists('actress'),
            'fanzamakers'   => Fanza::fanzaLists('maker'),
            'fanzaseriess'  => Fanza::fanzaLists('series'),
            'fanzamemos'    => FanzaReleasememo::releaseLists(),
            'myflists'      => FanzaReleaseMemo::myLists(),
            'myflistcount'  => FanzaReleaseMemo::myLists()->count(),
            'myfnices'      => FanzaNice::myNices(),
            'myfnicecount'  => FanzaNice::myNices()->count()
        ]);
    }

    public function create()
    {
        FanzaCreate::create();
    }

    public function store(Request $request)
    {
        Fanza::store($request);

        return back();
    }

    public function show($content_id)
    {
        $videoa = Fanza::whereContent_id($content_id)->first();

        return Inertia::render('Fanza/Video', [
            'videoa'              => $videoa,
            'date'                => $videoa->date->format('Y/m/d'), 
            'videoids'            => Fanza::videoIds($content_id),
            'fvideoids'           => Fanza::fVideoIds(20),
            'fanzaactresss'       => Kanren::fanzaKanren($content_id, 'actress'),
            'fanzaactresscount'   => Kanren::fanzaKanren($content_id, 'actress')->count(),
            'fanzamakers'         => Kanren::fanzaKanren($content_id, 'maker'),
            'fanzamakercount'     => Kanren::fanzaKanren($content_id, 'maker')->count(),
            'fanzaseriess'        => Kanren::fanzaKanren($content_id, 'series'),
            'fanzaseriescount'    => Kanren::fanzaKanren($content_id, 'series')->count(),
            'fanzadirectors'      => Kanren::fanzaKanren($content_id ,'director'),
            'fanzadirectorcount'  => Kanren::fanzaKanren($content_id ,'director')->count(),
            'fanzagenre2s'        => Kanren::fanzaKanren($content_id, 'genre2'),
            'fanzagenre2count'    => Kanren::fanzaKanren($content_id, 'genre2')->count(),
            'fanza_free_memos'    => FanzaFreememo::fanzaFreeMemos($content_id),
            'fanza_release_memos' => FanzaReleasememo::fanzaReleaseMemos($content_id),
            'fanza_release_memo_count' => FanzaReleasememo::fanzaReleaseMemos($content_id)->count(),
            'fanza_private_memos' => FanzaPrivateMemo::fanzaPrivateMemos($content_id),
            'privatememolimit'    => FanzaPrivateMemo::fanzaPrivateMemos($content_id)->count(),
            'mylists'             => FanzaReleaseMemo::myLists(),
            'mylistcount'         => FanzaReleaseMemo::myLists()->count(),
            'mynices'             => FanzaNice::myNices(),
            'mynicecount'         => FanzaNice::myNices()->count(),
            'releaselists'        => FanzaReleasememo::releaseLists(),
            'nice'                => FanzaNice::fanzaNice($content_id),
            'nicecount'           => FanzaNice::fanzaNiceCount($content_id),
        ]);
    }

    public function edit($type, $content_id, $memoid)
    {
        $videoa = Fanza::whereContent_id($content_id)->first();

        return Inertia::render('Fanza/Video/Edit', [
            'type' => $type, // privatememoかreleasememoか判断
            'videoa' => $videoa,
            'date' => $videoa->date->format('Y/m/d'),
            'videoids'        => Fanza::videoIds($content_id),
            'edit_release_memos' => FanzaReleaseMemo::editReleaseMemos($memoid),
            'edit_private_memos' => FanzaPrivateMemo::editPrivateMemos($memoid),
            'update_release_id' => FanzaReleaseMemo::whereId($memoid)->first(),
            'update_private_id' => FanzaPrivateMemo::whereId($memoid)->first(),
            'user_id' => Auth::id(),
            'nice' => FanzaNice::fanzaNice($content_id),
            'nicecount' => FanzaNice::fanzaNiceCount($content_id),
        ]);
    }

}
