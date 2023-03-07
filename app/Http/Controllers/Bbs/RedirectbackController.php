<?php

namespace App\Http\Controllers\Bbs;

use App\Http\Controllers\Controller;

class RedirectbackController extends Controller
{
    public function direct($currenturl)
    {
        return redirect($currenturl);
    }

    public function back($currenturl)
    {
        return redirect($currenturl);
    }
}
