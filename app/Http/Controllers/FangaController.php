<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Models\Fanza;
use App\Models\FanzaReleaseMemo;
use App\Models\Duga;
use App\Models\DugaReleaseMemo;

class FangaController extends Controller
{
    public function index()
    {
        return Inertia::render('Fanga', [
            'fvideoids'     => Fanza::fVideoIds(30),
            'fanzacount'    => Fanza::count(),
            'fanzaactresss' => Fanza::fanzaLists('actress'),
            'fanzamakers'   => Fanza::fanzaLists('maker'),
            'fanzaseriess'  => Fanza::fanzaLists('series'),
            'fanzamemos'    => FanzaReleasememo::releaseLists(),
            'myflists'      => FanzaReleaseMemo::myLists(),
            'myflistcount'  => FanzaReleaseMemo::myLists()->count(),
            'dvideoids'     => Duga::dVideoIds(30),
            'dugacount'     => Duga::count(),
            'dugaperformers'=> Duga::dugaLists('performer'),
            'dugamakers'    => Duga::dugaLists('maker'),
            'dugaseriess'   => Duga::dugaLists('series'),
            'dugamemos'     => DugaReleasememo::releaseLists(),
            'mydlists'      => DugaReleaseMemo::myLists(),
            'mydlistcount'  => DugaReleaseMemo::myLists()->count(),
        ]);
    }

    public function about()
    {
        return Inertia::render('Info/About');
    }

    public function privacy()
    {
        return Inertia::render('Info/Privacy');
    }

    public function rule()
    {
        return Inertia::render('Info/Rule');
    }

    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function searchFanza(Request $request)
    {
        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;
        $auth_id = Auth::id();

        $request->validate([
            'keyword' => 'required'
        ]);

        $fanzas = Fanza::fanzaKeyword($keyword);

        return view('Search/Fanza', compact('onemonths', 'fanzas', 'keyword', 'auth_id'));
    }

    public function searchDuga(Request $request)
    {
        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;
        $auth_id = Auth::id();

        $request->validate([
            'keyword' => 'required'
        ]);

        $dugas = Duga::dugakeyword($keyword);

        return view('Search/Duga', compact('onemonths', 'dugas', 'keyword', 'auth_id'));
    }
}
