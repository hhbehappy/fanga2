<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Models\Fanza;
use App\Models\FanzaReleaseMemo;
use App\Models\Thread;
use App\Services\SortKeyword;

class FanzaListController extends Controller
{
    public function index()
    {
        $videoids = Fanza::index();
        $onemonths = Carbon::today()->subMonth(1);
        $auth_id = Auth::id();

        return view('Fanza/Video/All', compact('videoids', 'onemonths', 'auth_id'));
    }

    public function show(Request $request)
    {

        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;
        $sort = SortKeyword::listSort($request->sort);
        $videolists = Fanza::videoLists($keyword);

        return view('Fanza/Video/List', compact('onemonths', 'videolists', 'sort', 'keyword'));
    }

    public function memoAll()
    {
        $releasealllists = FanzaReleaseMemo::releaseAllLists();

        return view('Fanza/Video/Memo/List/All', compact('releasealllists'));
    }

    public function memoListChunk($content_id)
    {
        $videoids   = Fanza::videoIds($content_id);
        $videoa     = Fanza::whereContent_id($content_id)->first();
        $release_memo_lists = FanzaReleaseMemo::fanzaReleaseMemoAllListChunk($content_id);
        $memocount     = FanzaReleaseMemo::fanzaReleaseMemoAllListChunk($content_id)->count();
        $releaselists  = FanzaReleasememo::releaseLists();
        $threads       = Thread::threadTitles();
        
        return view('Fanza/Video/Memo/List/Chunk', compact('videoa', 'videoids', 'release_memo_lists', 'memocount', 'releaselists', 'threads'));
    }

    public function memoListSort($sort, $content_id)
    {
        return Inertia::render('Fanza/Video/Memo/List/Sort', [
            'videoids'      => Fanza::videoIds($content_id),
            'videoa'        => Fanza::whereContent_id($content_id)->first(),
            'memolistsorts' => FanzaReleaseMemo::fanzaReleaseMemoAllListSort($sort, $content_id),
            'memocount'     => FanzaReleaseMemo::fanzaReleaseMemoAllListSort($sort, $content_id)->count(),
            'releaselists'  => FanzaReleasememo::releaseLists(),
            'auth_id'       => Auth::id(),
            'sort'          => $sort,
            'threads'       => Thread::threadTitles()
        ]);
    }

    public function memoListLatest($content_id)
    {
        return Inertia::render('Fanza/Video/Memo/List/Latest', [
            'videoids'        => Fanza::videoIds($content_id),
            'videoa'          => Fanza::whereContent_id($content_id)->first(),
            'memolistlatests' => FanzaReleaseMemo::fanzaReleaseMemoAllListLatest($content_id),
            'memocount'       => FanzaReleaseMemo::fanzaReleaseMemoAllListLatest($content_id)->count(),
            'releaselists'    => FanzaReleasememo::releaseLists(),
            'threads'         => Thread::threadTitles()
        ]);
    }

    public function destroy($id)
    {
        Fanza::destroy($id);

        return back();
    }

}
