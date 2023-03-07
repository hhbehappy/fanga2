<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Fanza;
use App\Models\Duga;

class SitemapController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fanza = DB::table('fanzas')->max('updated_at');
        $duga = DB::table('dugas')->max('updated_at');

        return response()->view('Sitemap/Index', compact('fanza', 'duga'))
            ->header('Content-Type', 'text/xml');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function fanza()
    {
        $fanga = DB::table('fanzas', 'dugas')->max('updated_at');
        $fanzas = Fanza::select('content_id', 'updated_at')->latest('updated_at')->get();

        return response()->view('Sitemap/Fanza', compact('fanga', 'fanzas'))
            ->header('Content-Type', 'text/xml');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function duga()
    {
        $dugas = Duga::select('productid', 'updated_at')->latest('updated_at')->get();

        return response()->view('Sitemap/Duga', compact('dugas'))
            ->header('Content-Type', 'text/xml');
    }
}
