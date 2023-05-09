<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Fanza;
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

    public function destroy($id)
    {
        Fanza::destroy($id);

        return back();
    }

}
