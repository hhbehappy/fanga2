<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Duga;

class DugaMakerController extends Controller
{
    public function maker()
    {
        $makerlists = Duga::select('productid', 'jacketimage', 'posterimage', 'title', 'maker', 'updated_at')->latest('updated_at')->get()->unique('maker');

        return Inertia::render('Duga/Video/Maker/Index', [
            'makerlists' => $makerlists
        ]);

    }

    public function maker_memo()
    {
        $makermemolists = DB::table('duga_release_memos')
            ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'maker', DB::raw('count(*) as total'))
            ->groupBy('productid', 're_productid', 'title', 'jacketimage', 'maker')->latest('total')
            ->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')
            ->take(100)->get()->unique('maker');

        return Inertia::render('Duga/Video/Maker/Memo', [
            'makermemolists' => $makermemolists
        ]);
    }

    public function maker_nice()
    {
        $makernicelists = DB::table('nices')
            ->select('nices.content_id', 're_productid', 'title', 'jacketimage', 'maker', 'type',DB::raw('count(*) as total'))
            ->groupBy('content_id', 're_productid', 'title', 'jacketimage', 'maker', 'type')->latest('total')
            ->leftJoin('dugas', 'nices.content_id', '=', 'dugas.productid')
            ->take(100)->get()->unique('maker');

        return Inertia::render('Duga/Video/Maker/Nice', [
            'makernicelists' => $makernicelists
        ]);
    }
}
