<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Duga;
use App\Models\DugaNice;
use App\Models\DugaFreeMemo;
use App\Models\DugaReleaseMemo;
use App\Models\DugaPrivateMemo;
use App\Services\Kanren;
use App\Services\DugaCreate;

class DugaVideoController extends Controller
{

    public function index()
    {
        return Inertia::render('Duga/Video/Search', [
            'dvideoids'     => Duga::dVideoIds(30),
            'dugacount'     => Duga::count(),
            'dugaperformers'=> Duga::dugaLists('performer'),
            'dugamakers'    => Duga::dugaLists('maker'),
            'dugaseriess'   => Duga::dugaLists('series'),
            'dugamemos'     => DugaReleasememo::releaseLists(),
            'mydlists'      => DugaReleaseMemo::myLists(),
            'mydlistcount'  => DugaReleaseMemo::myLists()->count(),
            'mydnices'      => DugaNice::myNices(),
            'mydnicecount'  => DugaNice::myNices()->count()
        ]);
    }

    public function create()
    {
        DugaCreate::create();
    }

    public function store(Request $request)
    {
        Duga::store($request);

        return back();
    }

    public function show($productid)
    {
        $currenturl = url()->current();
        $videod = Duga::whereProductid($productid)->first();
        
        return Inertia::render('Duga/Video', [
            'videod'            => $videod,
            'dugavideos'        => Duga::videoIds($productid),
            'date'              => $videod->date->format('Y/m/d'),
            're_productid'      => str_replace("-", "/", $videod->productid),
            'dvideoids'         => Duga::dVideoIds(20),
            'dugaperformers'    => Kanren::dugaKanren($productid, 'performer'),
            'dugaperformercount'=> Kanren::dugaKanren($productid, 'performer')->count(),
            'dugamakers'        => Kanren::dugaKanren($productid, 'maker'),
            'dugamakercount'    => Kanren::dugaKanren($productid, 'maker')->count(),
            'dugaseriess'       => Kanren::dugaKanren($productid, 'series'),
            'dugaseriescount'   => Kanren::dugaKanren($productid, 'series')->count(),
            'dugadirectors'     => Kanren::dugaKanren($productid, 'director'),
            'dugadirectorcount' => Kanren::dugaKanren($productid, 'director')->count(),
            'dugacategorys'     => Kanren::dugaKanren($productid, 'category'),
            'dugacategorycount' => Kanren::dugaKanren($productid, 'category')->count(),
            'duga_free_memos'   => DugaFreeMemo::dugaFreeMemos($productid),
            'duga_release_memos'=> DugaReleaseMemo::dugaReleaseMemos($productid),
            'duga_release_memo_count'=> DugaReleaseMemo::dugaReleaseMemos($productid)->count(),
            'mylists'           => DugaReleaseMemo::myLists(),
            'mylistcount'       => DugaReleaseMemo::myLists()->count(),
            'mynices'           => DugaNice::myNices(),
            'mynicecount'       => DugaNice::myNices()->count(),
            'releaselists'      => DugaReleaseMemo::releaseLists(),
            'duga_private_memos'=> DugaPrivateMemo::dugaPrivateMemos($productid),
            'privatememolimit'  => DugaPrivateMemo::dugaPrivateMemos($productid)->count(),
            'auth_id'           => Auth::id(),
            'nice'              => DugaNice::dugaNice($productid),
            'nicecount'         => DugaNice::dugaNicecount($productid),
            'currenturl'    => $currenturl
        ]);
    }

    public function edit($type, $productid, $memoid)
    {
        $videod = Duga::whereProductid($productid)->first();

        return Inertia::render('Duga/Video/Edit', [
            'type' => $type, // privatememoかreleasememoか判断
            'videod' => $videod,
            'dugavideos' => Duga::videoIds($productid),
            'date' => $videod->date->format('Y/m/d'), 
            're_productid' => str_replace("-", "/", $videod->productid),
            'duga_release_memos' => DugaReleaseMemo::editReleaseMemos($memoid),
            'duga_private_memos' => DugaPrivateMemo::editPrivateMemos($memoid),
            'update_release_id'  => DugaReleaseMemo::whereId($memoid)->first(),
            'update_private_id'  => DugaPrivateMemo::whereId($memoid)->first(),
            'auth_id'            => Auth::id(),
            'nice'               => DugaNice::dugaNice($productid),
            'nicecount'          => DugaNice::dugaNiceCount($productid)
        ]);
    }
}
