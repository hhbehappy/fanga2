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
        $fvideoids = Fanza::whereDate('date', '<', $today)->latest('date')->take(30)->get();
        $dvideoids = Duga::whereDate('date', '<', $today)->latest('date')->take(30)->get();
        $fanzacount = Fanza::count();
        $dugacount = Duga::count();
        $fanzaactresss = Fanza::whereDate('date', '<', $today)->whereNotIn('actress', [''])->latest('updated_at')->get()->unique('actress')->take(30);
        $fanzamakers = Fanza::whereDate('date', '<', $today)->whereNotIn('maker', [''])->latest('updated_at')->get()->unique('maker')->take(30);
        $fanzaseriess = Fanza::whereDate('date', '<', $today)->whereNotIn('series', [''])->latest('updated_at')->get()->unique('series')->take(30);
        $dugaperformers = Duga::whereDate('date', '<', $today)->whereNotIn('performer', [''])->latest('updated_at')->get()->unique('performer')->take(30);
        $dugamakers = Duga::whereDate('date', '<', $today)->whereNotIn('maker', [''])->latest('updated_at')->get()->unique('maker')->take(30);
        $dugaseriess = Duga::whereDate('date', '<', $today)->whereNotIn('series', [''])->latest('updated_at')->get()->unique('series')->take(30);

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

    public function about()
    {
        return Inertia::render('Info/About');
    }

    public function privacy()
    {
        return Inertia::render('Info/Privacy');
    }

    public function rule()
    {
        return Inertia::render('Info/Rule');
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
        $auth_id = Auth::id();

        $request->validate([
            'keyword' => 'required'
        ]);
        
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
            ->paginate(100);
        }

        return view('Search/Fanza', compact('onemonths', 'fanzas', 'keyword', 'auth_id'));
    }

    public function searchduga(Request $request)
    {
        $onemonths = Carbon::today()->subMonth(1);
        $keyword = $request->keyword;
        $auth_id = Auth::id();

        $request->validate([
            'keyword' => 'required'
        ]);

        if(!empty($keyword)){
            $dugas = Duga::where('productid', 'like','%'. $keyword. '%')
            ->orWhere('title', 'like','%'. $keyword. '%')
            ->orWhere('maker', 'like','%'. $keyword. '%')
            ->orWhere('label', 'like','%'. $keyword. '%')
            ->orWhere('series', 'like','%'. $keyword. '%')
            ->orWhere('performer', 'like','%'. $keyword. '%')
            ->orWhere('ruby', 'like','%'. $keyword. '%')
            ->orWhere('director', 'like','%'. $keyword. '%')
            ->orWhere('category', 'like','%'. $keyword. '%')
            ->latest('date')
            ->paginate(100);
        }

        return view('Search/Duga', compact('onemonths', 'dugas', 'keyword', 'auth_id'));
    }
}
