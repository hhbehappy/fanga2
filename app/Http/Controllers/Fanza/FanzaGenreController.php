<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use Inertia\Inertia;


class FanzaGenreController extends Controller
{
    public function genre()
    {
        return Inertia::render('Fanza/Video/Genre');
    }
}
