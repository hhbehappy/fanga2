<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Duga;
use App\Services\SortKeyword;

class DugaListController extends Controller
{
    public function index()
    {
        $videoids = Duga::index();
        $onemonths = Carbon::today()->subMonth(1);
        $auth_id = Auth::id();

        return view('Duga/Video/all', compact('videoids', 'onemonths', 'auth_id'));
    }

    public function show(Request $request)
    {

        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;
        $sort = SortKeyword::listSort($request->sort);
        $videolists = Duga::videoLists($keyword);

        return view('Duga/Video/list', compact('onemonths', 'videolists', 'sort', 'keyword'));
    }

    public function destroy($id)
    {
        Duga::destroy($id);

        return back();
    }
}
