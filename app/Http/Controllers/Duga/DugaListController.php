<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Duga;

class DugaListController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $videoids = Duga::whereDate('date', '<', $today)->latest('date')->paginate(100);
        $onemonths = Carbon::today()->subMonth(1);
        $auth_id = Auth::id();

        return view('Duga/Video/All', compact('videoids', 'onemonths', 'auth_id'));
    }

    public function show(Request $request)
    {

        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;

        if(!empty($keyword)){
            $videolists = Duga::where('maker', 'like', $keyword)
            ->orWhere('label', 'like', $keyword)
            ->orWhere('series', 'like', $keyword)
            ->orWhere('performer', 'like', $keyword)
            ->orWhere('director', 'like', $keyword)
            ->orWhere('category', 'like', $keyword)
            ->latest('date')
            ->paginate(100);
        }

        return view('Duga/Video/List', [           
            'onemonths' => $onemonths,
            'videolists' => $videolists,   
            'keyword' => $keyword   
        ]);
    }

    public function destroy($id)
    {
        
        $fanzavideo = Duga::findOrFail($id);
        $fanzavideo->delete();

        return back();

    }
}
