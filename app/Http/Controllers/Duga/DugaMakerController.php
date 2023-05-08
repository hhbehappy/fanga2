<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Duga;
use App\Models\DugaNice;
use App\Models\DugaReleaseMemo;

class DugaMakerController extends Controller
{
    public function maker()
    {
        return Inertia::render('Duga/Video/Maker/Index', [
            'makerlists' => Duga::itioshiLists('maker')
        ]);
    }

    public function makerAll()
    {
        $makeralllists = Duga::columnAll('maker');

        return view('Duga/Video/Maker/all', compact('makeralllists'));
    }

    public function makerSearch(Request $request)
    {
        $keyword = $request->keyword;
        $makersearchlists = Duga::columnSearch('maker', $keyword);

        return view('Duga/Video/Maker/search', compact('makersearchlists', 'keyword'));
    }

    public function makerMemo()
    {
        return Inertia::render('Duga/Video/Maker/Memo', [
            'makermemolists' => DugaReleaseMemo::memoList('maker')
        ]);
    }

    public function makerNice()
    {
        return Inertia::render('Duga/Video/Maker/Nice', [
            'makernicelists' => DugaNice::niceList('maker')
        ]);
    }

}
