<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use App\Services\SideBarRandomOrder;
use App\Services\MemoCount;

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
                'fanzafreememo' => MemoCount::fanzaFreeMemo(),
                'fanzareleasememo' => MemoCount::fanzaReleaseMemo(),
                'fanzaprivatememo' => MemoCount::fanzaPrivateMemo(),
                'dugafreememo' => MemoCount::dugaFreeMemo(),
                'dugareleasememo' => MemoCount::dugaReleaseMemo(),
                'dugaprivatememo' => MemoCount::dugaPrivateMemo(),
                'fanzanice' => MemoCount::fanzaNice(),
                'duganice' => MemoCount::dugaNice(),
            ],
            'sidebar' => [
                'fanzagenre' => SideBarRandomOrder::fanzaGenre(),
                'fanzaactress' => SideBarRandomOrder::fanzaSideBar('actress'),
                'fanzamaker' => SideBarRandomOrder::fanzaSideBar('maker'),
                'fanzaseries' => SideBarRandomOrder::fanzaSideBar('series'),
                'dugacategory' => SideBarRandomOrder::dugaCategory(),
                'dugaperformer' => SideBarRandomOrder::dugaSideBar('performer'),
                'dugamaker' => SideBarRandomOrder::dugaSideBar('maker'),
                'dugaseries' => SideBarRandomOrder::dugaSideBar('series'),
            ]
        ]);
    }
}
