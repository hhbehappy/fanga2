<?php

namespace App\Http\Controllers;

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
}
