<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\FanzaFreeMemo;
use App\Models\FanzaReleaseMemo;
use App\Models\FanzaPrivateMemo;
use App\Models\DugaFreeMemo;
use App\Models\DugaReleaseMemo;
use App\Models\DugaPrivateMemo;
use App\Models\Nice;

class MyPageController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $fanzaprivatememolists = FanzaPrivateMemo::where('user_id', Auth::id())->latest('updated_at')->get()->unique('content_id');
        $fanzareleasememolists = FanzaReleaseMemo::where('user_id', Auth::id())->latest('updated_at')->get()->unique('content_id');
        $fanzafreememolists = FanzaFreeMemo::where('user_id', Auth::id())->latest('updated_at')->get()->unique('content_id');
        $dugaprivatememolists = DugaPrivateMemo::select('title', 'duga_private_memos.productid', 're_productid', 'jacketimage', 'duga_private_memos.updated_at')
        ->where('user_id', Auth::id())->latest('updated_at')
        ->leftJoin('dugas', 'duga_private_memos.productid', '=', 'dugas.productid')->get()->unique('re_productid');
        $dugareleasememolists = DugaReleaseMemo::select('title', 'duga_release_memos.productid', 're_productid', 'jacketimage', 'duga_release_memos.updated_at')
        ->where('user_id', Auth::id())->latest('updated_at')
        ->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')->get()->unique('re_productid');
        $dugafreememolists = DugaFreeMemo::select('title', 'duga_free_memos.productid', 're_productid', 'jacketimage', 'duga_free_memos.updated_at')
        ->where('user_id', Auth::id())->latest('updated_at')
        ->leftJoin('dugas', 'duga_free_memos.productid', '=', 'dugas.productid')->get()->unique('re_productid');
        $nicelists = Nice::where('user_id', Auth::id())->latest('updated_at')->get()->unique('content_id');
        $duganicelists = Nice::select('type', 'title', 'productid', 're_productid', 'jacketimage', 'nices.updated_at')
        ->where('user_id', Auth::id())->latest('updated_at')
        ->leftJoin('dugas', 'content_id', '=', 'dugas.productid')->get()->unique('re_productid');

        return Inertia::render('Mypage', [
            'user' => $user,
            'fanzaprivatememolists'     => $fanzaprivatememolists,
            'fanzareleasememolists'     => $fanzareleasememolists,
            'fanzafreememolists'        => $fanzafreememolists,
            'dugaprivatememolists'      => $dugaprivatememolists,
            'dugareleasememolists'      => $dugareleasememolists,
            'dugafreememolists'         => $dugafreememolists,
            'nicelists'                 => $nicelists,
            'duganicelists'             => $duganicelists
        ]);
    }
}
