<?php

namespace App\Http\Controllers;

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
