<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Duga;

class DugaMakerController extends Controller
{
    public function maker()
    {
        $makerlists = Duga::select('productid', 'jacketimage', 'posterimage', 'title', 'maker', 'updated_at')->whereNotIn('maker', [''])->latest('updated_at')->get()->unique('maker')->take(60);

        return Inertia::render('Duga/Video/Maker/Index', [
            'makerlists' => $makerlists
        ]);

    }

    public function maker_all()
    {
        $makeralllists = Duga::groupBy('maker')->whereNotIn('maker', [''])->oldest('maker')->paginate(100);

        return view('Duga/Video/Maker/All', compact('makeralllists'));
    }

    public function maker_search(Request $request)
    {
        $keyword = $request->keyword;

        if(!empty($keyword)){
            $makersearchlists = Duga::where('maker', 'like', $keyword . '%')->groupBy('maker')->oldest('maker')->paginate(100);
        }

        return view('Duga/Video/Maker/Search', compact('makersearchlists', 'keyword'));
    }

    public function maker_memo()
    {
        $makermemolists = DB::table('duga_release_memos')
            ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'maker', DB::raw('count(*) as total'))
            ->groupBy('productid', 're_productid', 'title', 'jacketimage', 'maker')->latest('total')
            ->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')
            ->get()->unique('maker')->take(100);

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
            ->get()->unique('maker')->take(100);

        return Inertia::render('Duga/Video/Maker/Nice', [
            'makernicelists' => $makernicelists
        ]);
    }
}
