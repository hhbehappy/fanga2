<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\FanzaNice;
use App\Models\FanzaFreeMemo;
use App\Models\FanzaReleaseMemo;
use App\Models\FanzaPrivateMemo;
use App\Models\DugaNice;
use App\Models\DugaFreeMemo;
use App\Models\DugaReleaseMemo;
use App\Models\DugaPrivateMemo;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        $user = auth()->user();
        $fanzaprivatememolists = FanzaPrivateMemo::select('fanza_private_memos.content_id', 'title', 'fanzas.updated_at')->whereUser_id(Auth::id())->latest('updated_at')->leftJoin('fanzas', 'fanza_private_memos.content_id', '=', 'fanzas.content_id')->get()->unique('content_id');
        $fanzareleasememolists = FanzaReleaseMemo::select('fanza_release_memos.content_id', 'title', 'fanzas.updated_at')->whereUser_id(Auth::id())->latest('updated_at')->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')->get()->unique('content_id');
        $fanzafreememolists = FanzaFreeMemo::select('fanza_free_memos.content_id', 'title', 'fanzas.updated_at')->whereUser_id(Auth::id())->latest('updated_at')->leftJoin('fanzas', 'fanza_free_memos.content_id', '=', 'fanzas.content_id')->get()->unique('content_id');
        $dugaprivatememolists = DugaPrivateMemo::select('title', 'duga_private_memos.productid', 're_productid', 'jacketimage', 'duga_private_memos.updated_at')
        ->whereUser_id(Auth::id())->latest('updated_at')
        ->leftJoin('dugas', 'duga_private_memos.productid', '=', 'dugas.productid')->get()->unique('re_productid');
        $dugareleasememolists = DugaReleaseMemo::select('title', 'duga_release_memos.productid', 're_productid', 'jacketimage', 'duga_release_memos.updated_at')
        ->whereUser_id(Auth::id())->latest('updated_at')
        ->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')->get()->unique('re_productid');
        $dugafreememolists = DugaFreeMemo::select('title', 'duga_free_memos.productid', 're_productid', 'jacketimage', 'duga_free_memos.updated_at')
        ->whereUser_id(Auth::id())->latest('updated_at')
        ->leftJoin('dugas', 'duga_free_memos.productid', '=', 'dugas.productid')->get()->unique('re_productid');
        $fanzanicelists = FanzaNice::select('fanza_nices.content_id', 'title', 'fanzas.updated_at')->whereUser_id(Auth::id())->latest('updated_at')->leftJoin('fanzas', 'fanza_nices.content_id', '=', 'fanzas.content_id')->get()->unique('content_id');
        $duganicelists = DugaNice::select('title', 'duga_nices.productid', 're_productid', 'jacketimage', 'duga_nices.updated_at')->whereUser_id(Auth::id())->latest('updated_at') ->leftJoin('dugas', 'duga_nices.productid', '=', 'dugas.productid')->get()->unique('re_productid');

        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'user' => $user,
            'fanzaprivatememolists'     => $fanzaprivatememolists,
            'fanzareleasememolists'     => $fanzareleasememolists,
            'fanzafreememolists'        => $fanzafreememolists,
            'dugaprivatememolists'      => $dugaprivatememolists,
            'dugareleasememolists'      => $dugareleasememolists,
            'dugafreememolists'         => $dugafreememolists,
            'fanzanicelists'            => $fanzanicelists,
            'duganicelists'             => $duganicelists
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('mypage');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
