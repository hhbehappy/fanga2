<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Models\Duga;
use App\Models\DugaReleaseMemo;
use App\Models\Thread;
use App\Services\SortKeyword;

class DugaListController extends Controller
{
    public function index()
    {
        $videoids = Duga::index();
        $onemonths = Carbon::today()->subMonth(1);
        $auth_id = Auth::id();

        return view('Duga/Video/All', compact('videoids', 'onemonths', 'auth_id'));
    }

    public function show(Request $request)
    {

        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;
        $sort = SortKeyword::listSort($request->sort);
        $videolists = Duga::videoLists($keyword);

        return view('Duga/Video/List', compact('onemonths', 'videolists', 'sort', 'keyword'));
    }

    public function memoAll()
    {
        $releasealllists = DugaReleaseMemo::releaseAllLists();

        return view('Duga/Video/Memo/List/All', compact('releasealllists'));
    }

    public function memoListChunk($productid)
    {
        $videod             = Duga::whereProductid($productid)->first();
        $videoids           = Duga::videoIds($productid);
        $re_productid       = str_replace("-", "/", $videod->productid);
        $release_memo_lists = DugaReleaseMemo::dugaReleaseMemoAllListChunk($productid);
        $memocount          = DugaReleaseMemo::dugaReleaseMemoAllListChunk($productid)->count();
        $releaselists       = DugaReleasememo::releaseLists();
        $threads            = Thread::threadTitles();
        
        return view('Duga/Video/Memo/List/Chunk', compact('videod', 'videoids', 're_productid',  'release_memo_lists', 'memocount', 'releaselists', 'threads'));
    }

    public function memoListSort($sort, $productid)
    {
        $videod = Duga::whereProductid($productid)->first();

        return Inertia::render('Duga/Video/Memo/List/Sort', [
            'videod'        => $videod,
            'videoids'      => Duga::videoIds($productid),
            're_productid'  => str_replace("-", "/", $videod->productid),
            'memolistsorts' => DugaReleaseMemo::dugaReleaseMemoAllListSort($sort, $productid),
            'memocount'     => DugaReleaseMemo::dugaReleaseMemoAllListSort($sort, $productid)->count(),
            'releaselists'  => DugaReleasememo::releaseLists(),
            'auth_id'       => Auth::id(),
            'sort'          => $sort,
            'threads'       => Thread::threadTitles()
        ]);
    }

    public function memoListLatest($productid)
    {
        $videod = Duga::whereProductid($productid)->first();

        return Inertia::render('Duga/Video/Memo/List/Latest', [
            'videod'          => $videod,
            'videoids'        => Duga::videoIds($productid),
            're_productid'    => str_replace("-", "/", $videod->productid),
            'memolistlatests' => DugaReleaseMemo::dugaReleaseMemoAllListLatest($productid),
            'memocount'       => DugaReleaseMemo::dugaReleaseMemoAllListLatest($productid)->count(),
            'releaselists'    => DugaReleasememo::releaseLists(),
            'threads'         => Thread::threadTitles()
        ]);
    }

    public function destroy($id)
    {
        Duga::destroy($id);

        return back();
    }
}
