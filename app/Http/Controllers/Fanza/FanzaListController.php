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
        $videoids = Fanza::latest('date')->paginate(100);
        $onemonths = Carbon::today()->subMonth(1);
        $auth_id = Auth::id();

        return view('Fanza/Video/All', compact('videoids', 'onemonths', 'auth_id'));
    }

    public function show(Request $request)
    {

        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;
        $sort = SortKeyword::listSort($request->sort);
        
        if(!empty($keyword)){
            $videolists = Fanza::where('maker', 'like', $keyword)
            ->orWhere('label', 'like', $keyword)
            ->orWhere('series', 'like', $keyword)
            ->orWhere('actress', 'like', $keyword)
            ->orWhere('director', 'like', $keyword)
            ->orWhere('genre', 'like', $keyword)
            ->orWhere('genre1', 'like', $keyword)
            ->orWhere('genre2', 'like', $keyword)
            ->orWhere('genre3', 'like', $keyword)
            ->orWhere('genre4', 'like', $keyword)
            ->orWhere('genre5', 'like', $keyword)
            ->orWhere('genre6', 'like', $keyword)
            ->orWhere('genre7', 'like', $keyword)
            ->orWhere('genre8', 'like', $keyword)
            ->orWhere('genre9', 'like', $keyword)
            ->latest('date')
            ->paginate(100);
        }


        return view('Fanza/Video/List', compact('onemonths', 'videolists', 'sort', 'keyword'));
    }

    public function destroy($id)
    {
        
        $fanzavideo = Fanza::findOrFail($id);
        $fanzavideo->delete();

        return back();

    }

}
