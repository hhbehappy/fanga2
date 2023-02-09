<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;
use App\Models\Fanza;
use App\Models\Duga;

class FangaController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $fvideoids = Fanza::whereDate('date', '<', $today)->latest('date')->limit(30)->get();
        $dvideoids = Duga::whereDate('date', '<', $today)->latest('date')->limit(30)->get();
        $fanzacount = Fanza::count();
        $dugacount = Duga::count();
        $fanzaactresss = Fanza::whereDate('date', '<', $today)->latest('updated_at')->limit(30)->get()->unique('actress');
        $fanzamakers = Fanza::whereDate('date', '<', $today)->latest('date')->limit(30)->get()->unique('maker');
        $fanzaseriess = Fanza::whereDate('date', '<', $today)->latest('updated_at')->limit(30)->get()->unique('series');
        $dugaperformers = Duga::whereDate('date', '<', $today)->latest('date')->limit(30)->get()->unique('performer');
        $dugamakers = Duga::whereDate('date', '<', $today)->latest('date')->limit(30)->get()->unique('maker');
        $dugaseriess = Duga::whereDate('date', '<', $today)->latest('date')->limit(30)->get()->unique('series');

        return Inertia::render('Fanga', [
            'fvideoids' => $fvideoids,
            'dvideoids' => $dvideoids,
            'fanzacount' => $fanzacount,
            'dugacount' => $dugacount,
            'fanzaactresss' => $fanzaactresss,
            'fanzamakers' => $fanzamakers,
            'fanzaseriess' => $fanzaseriess,
            'dugaperformers' => $dugaperformers,
            'dugamakers' => $dugamakers,
            'dugaseriess' => $dugaseriess,
        ]);
    }

    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function searchfanza(Request $request)
    {
        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;
        
        if(!empty($keyword)){
            $fanzas = Fanza::where('content_id', 'like', '%'. $keyword. '%')
            ->orWhere('title', 'like', '%'. $keyword. '%')
            ->orWhere('maker', 'like', '%'. $keyword. '%')
            ->orWhere('label', 'like', '%'. $keyword. '%')
            ->orWhere('series', 'like', '%'. $keyword. '%')
            ->orWhere('actress', 'like', '%'. $keyword. '%')
            ->orWhere('director', 'like', '%'. $keyword. '%')
            ->orWhere('genre', 'like', '%'. $keyword. '%')
            ->orWhere('genre1', 'like', '%'. $keyword. '%')
            ->orWhere('genre2', 'like', '%'. $keyword. '%')
            ->orWhere('genre3', 'like', '%'. $keyword. '%')
            ->orWhere('genre4', 'like', '%'. $keyword. '%')
            ->orWhere('genre5', 'like', '%'. $keyword. '%')
            ->orWhere('genre6', 'like', '%'. $keyword. '%')
            ->orWhere('genre7', 'like', '%'. $keyword. '%')
            ->orWhere('genre8', 'like', '%'. $keyword. '%')
            ->orWhere('genre9', 'like', '%'. $keyword. '%')
            ->latest('date')
            ->paginate(20);
        }

        return view('Search/Fanza', compact('onemonths', 'fanzas', 'keyword'));
    }

    public function searchduga(Request $request)
    {
        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;

        if(!empty($keyword)){
            $dugas = Duga::where('productid', 'like','%'. $keyword. '%')
            ->orWhere('title', 'like','%'. $keyword. '%')
            ->orWhere('maker', 'like','%'. $keyword. '%')
            ->orWhere('maker', 'like','%'. $keyword. '%')
            ->orWhere('label', 'like','%'. $keyword. '%')
            ->orWhere('series', 'like','%'. $keyword. '%')
            ->orWhere('performer', 'like','%'. $keyword. '%')
            ->orWhere('director', 'like','%'. $keyword. '%')
            ->orWhere('category', 'like','%'. $keyword. '%')
            ->latest('date')
            ->paginate(20);
        }

        return view('Search/Duga', compact('onemonths', 'dugas', 'keyword'));
    }
}
