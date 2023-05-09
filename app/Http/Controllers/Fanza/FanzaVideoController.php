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
        $content_id_1 = Fanza::findOrFail($content_id);

        return Inertia::render('Fanza/Video', [
            'videoa'              => $videoa,
            'date'                => $videoa->date->format('Y/m/d'), 
            'videoids'            => Fanza::find($content_id_1),
            'fvideoids'           => Fanza::fVideoIds(20),
            'fanzaactresss'       => Kanren::fanzaActresss($content_id),
            'fanzaactresscount'   => Kanren::fanzaActresss($content_id)->count(),
            'fanzamakers'         => Kanren::fanzaMakers($content_id),
            'fanzamakercount'     => Kanren::fanzaMakers($content_id)->count(),
            'fanzaseriess'        => Kanren::fanzaSeriess($content_id),
            'fanzaseriescount'    => Kanren::fanzaSeriess($content_id)->count(),
            'fanzadirectors'      => Kanren::fanzaDirectors($content_id),
            'fanzadirectorcount'  => Kanren::fanzaDirectors($content_id)->count(),
            'fanzagenre2s'        => Kanren::fanzaGenre2s($content_id),
            'fanzagenre2count'    => Kanren::fanzaGenre2s($content_id)->count(),
            'fanza_free_memos'    => FanzaFreememo::fanzaFreeMemos($content_id),
            'fanza_release_memos' => FanzaReleasememo::fanzaReleaseMemos($content_id),
            'fanza_private_memos' => FanzaPrivateMemo::fanzaPrivateMemos($content_id),
            'mylists'             => FanzaReleaseMemo::myLists(),
            'mylistcount'         => FanzaReleaseMemo::myLists()->count(),
            'releaselists'        => FanzaReleasememo::releaseLists(),
            'auth_id'             => Auth::id(),
            'nice'                => FanzaNice::fanzaNice($content_id),
            'nicecount'           => FanzaNice::fanzaNiceCount($content_id),
            'privatememolimit'    => FanzaPrivateMemo::privateMemoLimit($content_id),
        ]);
    }

    public function edit($type, $content_id, $memoid)
    {
        $videoa = Fanza::whereContent_id($content_id)->first();
        $content_id_1 = Fanza::findOrFail($content_id);

        return Inertia::render('Fanza/Video/Edit', [
            'type' => $type, // privatememoかreleasememoか判断
            'videoa' => $videoa,
            'date' => $videoa->date->format('Y/m/d'),
            'videoids' => Fanza::find($content_id_1),
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
