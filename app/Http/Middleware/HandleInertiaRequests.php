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
                'fanzafreememo' => MemoCount::fanzafreememo(),
                'fanzareleasememo' => MemoCount::fanzareleasememo(),
                'fanzaprivatememo' => MemoCount::fanzaprivatememo(),
                'dugafreememo' => MemoCount::dugafreememo(),
                'dugareleasememo' => MemoCount::dugareleasememo(),
                'dugaprivatememo' => MemoCount::dugaprivatememo(),
                'fanzanice' => MemoCount::fanzanice(),
                'duganice' => MemoCount::duganice(),
            ],
            'sidebar' => [
                'fanzagenre' => SideBarRandomOrder::fanzagenre(),
                'fanzaactress' => SideBarRandomOrder::fanzaactress(),
                'fanzamaker' => SideBarRandomOrder::fanzamaker(),
                'fanzaseries' => SideBarRandomOrder::fanzaseries(),
                'dugacategory' => SideBarRandomOrder::dugacategory(),
                'dugaperformer' => SideBarRandomOrder::dugaSideBar('performer'),
                'dugamaker' => SideBarRandomOrder::dugaSideBar('maker'),
                'dugaseries' => SideBarRandomOrder::dugaSideBar('series'),
            ]
        ]);
    }
}
