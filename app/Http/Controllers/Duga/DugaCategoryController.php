<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class DugaCategoryController extends Controller
{
    public function category()
    {
        return Inertia::render('Duga/Video/Category');
    }
}
