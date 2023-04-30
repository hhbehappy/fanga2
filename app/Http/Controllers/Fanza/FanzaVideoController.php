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
            'fvideoids'           => Fanza::fvideoids(20),
            'fanzaactresss'       => Kanren::fanzaactresss($content_id),
            'fanzaactresscount'   => Kanren::fanzaactresss($content_id)->count(),
            'fanzamakers'         => Kanren::fanzamakers($content_id),
            'fanzamakercount'     => Kanren::fanzamakers($content_id)->count(),
            'fanzaseriess'        => Kanren::fanzaseriess($content_id),
            'fanzaseriescount'    => Kanren::fanzaseriess($content_id)->count(),
            'fanzadirectors'      => Kanren::fanzadirectors($content_id),
            'fanzadirectorcount'  => Kanren::fanzadirectors($content_id)->count(),
            'fanzagenre2s'        => Kanren::fanzagenre2s($content_id),
            'fanzagenre2count'    => Kanren::fanzagenre2s($content_id)->count(),
            'fanza_free_memos'    => FanzaFreememo::fanza_free_memos($content_id),
            'fanza_release_memos' => FanzaReleasememo::fanza_release_memos($content_id),
            'fanza_private_memos' => FanzaPrivateMemo::fanza_private_memos($content_id),
            'mylists'             => FanzaReleaseMemo::mylists(),
            'mylistcount'         => FanzaReleaseMemo::mylists()->count(),
            'releaselists'        => FanzaReleasememo::releaselists(),
            'auth_id'             => Auth::id(),
            'nice'                => FanzaNice::fanzanice($content_id),
            'nicecount'           => FanzaNice::fanzanicecount($content_id),
            'privatememolimit'    => FanzaPrivateMemo::privatememolimit($content_id),
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
            'edit_release_memos' => FanzaReleaseMemo::edit_release_memos($memoid),
            'edit_private_memos' => FanzaPrivateMemo::edit_private_memos($memoid),
            'update_release_id' => FanzaReleaseMemo::whereId($memoid)->first(),
            'update_private_id' => FanzaPrivateMemo::whereId($memoid)->first(),
            'user_id' => Auth::id(),
            'nice' => FanzaNice::fanzanice($content_id),
            'nicecount' => FanzaNice::fanzanicecount($content_id),
        ]);
    }

}
