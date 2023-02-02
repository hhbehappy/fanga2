<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFanzaFreeMemoRequest;
use App\Http\Requests\UpdateFanzaFreeMemoRequest;
use App\Models\FanzaFreeMemo;

class FanzaFreeMemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFanzaFreeMemoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFanzaFreeMemoRequest $request, $fanza_id)
    {
        dd($fanza_id);
        FanzaFreeMemo::create([
            'user_id'      => Auth::id(),
            'fanza_id'     => $fanza_id,
            'memo'         => $request->get('memo')
        ]);

        return back()
        ->with([
            'message' => 'メモを送信しました。',
            'status'  => 'store'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FanzaFreeMemo  $fanzaFreeMemo
     * @return \Illuminate\Http\Response
     */
    public function show(FanzaFreeMemo $fanzaFreeMemo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FanzaFreeMemo  $fanzaFreeMemo
     * @return \Illuminate\Http\Response
     */
    public function edit(FanzaFreeMemo $fanzaFreeMemo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFanzaFreeMemoRequest  $request
     * @param  \App\Models\FanzaFreeMemo  $fanzaFreeMemo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFanzaFreeMemoRequest $request, FanzaFreeMemo $fanzaFreeMemo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FanzaFreeMemo  $fanzaFreeMemo
     * @return \Illuminate\Http\Response
     */
    public function destroy(FanzaFreeMemo $fanzaFreeMemo)
    {
        //
    }
}
