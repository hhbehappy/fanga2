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
// use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function fanza_private(Request $request)
    {

        if ($request->get('display') === null) {
            $display = 'video';
        } else {
            $display = $request->get('display');
        }

        $group = $request->get('group');

        if ($request->get('sort') === null) {
            $sort = 'latest';
        } else {
            $sort = $request->get('sort');
        }

        if ($request->get('type') === null) {
            $type = 'top';
        } else {
            $type = $request->get('type');
        }

        if ($request->get('hits') === null) {
            $hits = '20';
        } else {
            $hits = $request->get('hits');
        }

        return Inertia::render('Profile/Fanza/Private', [
            'display' => $display,
            'sort'   => $sort,
            'group'  => $group,
            'type'   => $type,
            'hits'   => $hits,
            'fanzaprivatememolists'     => FanzaPrivateMemo::privateMemoLists($group, $sort, $hits),
            'fanzaprivatememovideolists' => FanzaPrivateMemo::privateMemoVideoLists($sort, $hits),
        ]);
    }

    public function fanza_release(Request $request)
    {

        if ($request->get('display') === null) {
            $display = 'video';
        } else {
            $display = $request->get('display');
        }

        $group = $request->get('group');

        if ($request->get('sort') === null) {
            $sort = 'latest';
        } else {
            $sort = $request->get('sort');
        }

        if ($request->get('type') === null) {
            $type = 'top';
        } else {
            $type = $request->get('type');
        }

        if ($request->get('hits') === null) {
            $hits = '20';
        } else {
            $hits = $request->get('hits');
        }

        return Inertia::render('Profile/Fanza/Release', [
            'display' => $display,
            'sort'   => $sort,
            'group'  => $group,
            'type'  => $type,
            'hits'   => $hits,
            'fanzareleasememolists'     => FanzaReleaseMemo::releaseMemoLists($group, $sort, $hits),
            'fanzareleasememovideolists' => FanzaReleaseMemo::releaseMemoVideoLists($sort, $hits),
        ]);
    }

    public function fanza_free(Request $request)
    {

        if ($request->get('display') === null) {
            $display = 'video';
        } else {
            $display = $request->get('display');
        }

        $group = $request->get('group');

        if ($request->get('sort') === null) {
            $sort = 'latest';
        } else {
            $sort = $request->get('sort');
        }

        if ($request->get('type') === null) {
            $type = 'top';
        } else {
            $type = $request->get('type');
        }

        if ($request->get('hits') === null) {
            $hits = '20';
        } else {
            $hits = $request->get('hits');
        }

        return Inertia::render('Profile/Fanza/Free', [
            'display' => $display,
            'sort'   => $sort,
            'group'  => $group,
            'type'   => $type,
            'hits'   => $hits,
            'fanzafreememolists'     => FanzaFreeMemo::freeMemoLists($group, $sort, $hits),
            'fanzafreememovideolists' => FanzaFreeMemo::freeMemoVideoLists($sort, $hits),
        ]);
    }

    public function fanza_nice(Request $request)
    {

        if ($request->get('display') === null) {
            $display = 'video';
        } else {
            $display = $request->get('display');
        }

        $group = $request->get('group');

        if ($request->get('sort') === null) {
            $sort = 'latest';
        } else {
            $sort = $request->get('sort');
        }

        if ($request->get('type') === null) {
            $type = 'top';
        } else {
            $type = $request->get('type');
        }

        if ($request->get('hits') === null) {
            $hits = '20';
        } else {
            $hits = $request->get('hits');
        }

        return Inertia::render('Profile/Fanza/Nice', [
            'display' => $display,
            'sort'   => $sort,
            'group'  => $group,
            'type'   => $type,
            'hits'   => $hits,
            'fanzanicevideolists' => FanzaNice::niceVideoLists($sort, $hits),
        ]);
    }

    public function duga_private(Request $request)
    {

        if ($request->get('display') === null) {
            $display = 'video';
        } else {
            $display = $request->get('display');
        }

        $group = $request->get('group');

        if ($request->get('sort') === null) {
            $sort = 'latest';
        } else {
            $sort = $request->get('sort');
        }

        if ($request->get('type') === null) {
            $type = 'top';
        } else {
            $type = $request->get('type');
        }

        if ($request->get('hits') === null) {
            $hits = '20';
        } else {
            $hits = $request->get('hits');
        }

        return Inertia::render('Profile/Duga/Private', [
            'display' => $display,
            'sort'   => $sort,
            'group'  => $group,
            'type'  => $type,
            'hits'   => $hits,
            'dugaprivatememolists'     => DugaPrivateMemo::privateMemoLists($group, $sort, $hits),
            'dugaprivatememovideolists' => DugaPrivateMemo::privateMemoVideoLists($sort, $hits),
        ]);
    }

    public function duga_release(Request $request)
    {

        if ($request->get('display') === null) {
            $display = 'video';
        } else {
            $display = $request->get('display');
        }

        $group = $request->get('group');

        if ($request->get('sort') === null) {
            $sort = 'latest';
        } else {
            $sort = $request->get('sort');
        }

        if ($request->get('type') === null) {
            $type = 'top';
        } else {
            $type = $request->get('type');
        }

        if ($request->get('hits') === null) {
            $hits = '20';
        } else {
            $hits = $request->get('hits');
        }

        return Inertia::render('Profile/Duga/Release', [
            'display' => $display,
            'sort'   => $sort,
            'group'  => $group,
            'type'  => $type,
            'hits'   => $hits,
            'dugareleasememolists'     => DugaReleaseMemo::releaseMemoLists($group, $sort, $hits),
            'dugareleasememovideolists' => DugaReleaseMemo::releaseMemoVideoLists($sort, $hits),
        ]);
    }

    public function duga_free(Request $request)
    {

        if ($request->get('display') === null) {
            $display = 'video';
        } else {
            $display = $request->get('display');
        }

        $group = $request->get('group');

        if ($request->get('sort') === null) {
            $sort = 'latest';
        } else {
            $sort = $request->get('sort');
        }

        if ($request->get('type') === null) {
            $type = 'top';
        } else {
            $type = $request->get('type');
        }

        if ($request->get('hits') === null) {
            $hits = '20';
        } else {
            $hits = $request->get('hits');
        }

        return Inertia::render('Profile/Duga/Free', [
            'display' => $display,
            'sort'   => $sort,
            'group'  => $group,
            'type'  => $type,
            'hits'   => $hits,
            'dugafreememolists'     => DugaFreeMemo::freeMemoLists($group, $sort, $hits),
            'dugafreememovideolists' => DugaFreeMemo::freeMemoVideoLists($sort, $hits),
        ]);
    }

    public function duga_nice(Request $request)
    {
        if ($request->get('display') === null) {
            $display = 'video';
        } else {
            $display = $request->get('display');
        }

        $group = $request->get('group');

        if ($request->get('sort') === null) {
            $sort = 'latest';
        } else {
            $sort = $request->get('sort');
        }

        if ($request->get('type') === null) {
            $type = 'top';
        } else {
            $type = $request->get('type');
        }

        if ($request->get('hits') === null) {
            $hits = '20';
        } else {
            $hits = $request->get('hits');
        }

        return Inertia::render('Profile/Duga/Nice', [
            'display' => $display,
            'sort'   => $sort,
            'group'  => $group,
            'type'  => $type,
            'hits'   => $hits,
            'duganicevideolists' => DugaNice::niceVideoLists($sort, $hits),
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function account(Request $request): Response
    {

        return Inertia::render('Profile/Account', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
            'user'   => auth()->user()
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
