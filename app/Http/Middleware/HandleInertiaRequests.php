<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use App\Models\FanzaFreeMemo;
use App\Models\FanzaReleaseMemo;
use App\Models\FanzaPrivateMemo;
use App\Models\DugaFreeMemo;
use App\Models\DugaReleaseMemo;
use App\Models\DugaPrivateMemo;
use App\Models\Nice;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'flash' => [
                'message' => fn () => $request->session()->get('message'),
                'nicemessage' => fn () => $request->session()->get('nicemessage'),
                'status' => fn () => $request->session()->get('status'),
            ],
            'count' => [
                'fanzafreememo' => FanzaFreeMemo::whereUser_id(Auth::id())->select('content_id')->get()->unique('content_id')->count(),
                'fanzareleasememo' => FanzaReleaseMemo::whereUser_id(Auth::id())->select('content_id')->get()->unique('content_id')->count(),
                'fanzaprivatememo' => FanzaprivateMemo::whereUser_id(Auth::id())->select('content_id')->get()->unique('content_id')->count(),
                'dugafreememo' => DugaFreeMemo::whereUser_id(Auth::id())->select('productid')->get()->unique('productid')->count(),
                'dugareleasememo' => DugaReleaseMemo::whereUser_id(Auth::id())->select('productid')->get()->unique('productid')->count(),
                'dugaprivatememo' => DugaPrivateMemo::whereUser_id(Auth::id())->select('productid')->get()->unique('productid')->count(),
                'fanzanice' => Nice::where([['user_id', Auth::id()], ['type', 'fanza']])->select('content_id')->get()->unique('content_id')->count(),
                'duganice' => Nice::where([['user_id', Auth::id()], ['type', 'duga']])->select('content_id')->get()->unique('content_id')->count(),
            ],
        ]);
    }
}
