<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
// use Carbon\Carbon;
use App\Models\Fanza;
use App\Models\Duga;

class FangaController extends Controller
{
    public function index()
    {
        $videoids = Fanza::all();
        $dugavideos = Duga::all();

        return Inertia::render('Fanga', [
            'videoids' => $videoids,
            'dugavideos' => $dugavideos,
        ]);
    }
}
