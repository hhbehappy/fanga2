<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FangaController;
use App\Http\Controllers\FanzaVideoController;
use App\Http\Controllers\FanzaListController;
use App\Http\Controllers\FanzaFreeMemoController;
use App\Http\Controllers\FanzaReleaseMemoController;
use App\Http\Controllers\FanzaPrivateMemoController;
use App\Http\Controllers\DugaVideoController;
use App\Http\Controllers\DugaListController;
use App\Http\Controllers\DugaFreeMemoController;
use App\Http\Controllers\DugaReleaseMemoController;
use App\Http\Controllers\DugaPrivateMemoController;
use App\Http\Controllers\NiceController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RedirectbackController;
use App\Http\Controllers\InquiryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FangaController::class, 'index'])->name('fanga');
Route::get('/logout', [FangaController::class, 'logout'])->name('fanga.logout');

// マイページ
Route::get('/mypage', [MyPageController::class, 'index'])->middleware(['auth', 'verified'])->name('mypage');

// 検索ページ
Route::get('/search/fanza', [FangaController::class, 'searchfanza'])->name('fanga.searchfanza');
Route::get('/search/duga', [FangaController::class, 'searchduga'])->name('fanga.searchduga');

// 気になる動画機能
Route::get('/nice/{content_id}/{fanza_id}/{duga_id}/{type}', [NiceController::class, 'nice'])->name('nice');
Route::post('/nice/{content_id}/{fanza_id}/{duga_id}/{type}', [NiceController::class, 'nice']);
Route::get('/unnice/{content_id}', [NiceController::class, 'unnice'])->name('unnice');
Route::post('/unnice/{content_id}', [NiceController::class, 'unnice']);

// BBS
Route::controller(ThreadController::class)->group(function ()
{
    Route::get('/bbs', 'index')->name('bbs');
    Route::get('/bbs/create', 'create')->middleware(['auth', 'verified'])->name('threads.create');
    Route::get('/bbs/{id}', 'show')->name('threads.show');
    Route::get('/threads/store/{id}', 'store')->name('threads.store');
    Route::post('/threads/store', 'store');
    Route::delete('/threads/destroy/{id}', 'destroy')->name('threads.destroy');
});
Route::controller(CommentController::class)->group(function ()
{
    Route::get('/comments/store/{id}', 'store')->name('comments.store');
    Route::post('/comments/store/{id}', 'store');
    Route::delete('/comments/destroy/{id}', 'destroy')->name('comments.destroy');
});
Route::post('/commentlogin', [RedirectbackController::class, 'direct'])->middleware(['auth', 'verified']);

// お問い合わせ
Route::get('/inquiry', [InquiryController::class, 'index'])->name('inquiry');
Route::get('/inquiry/store', [InquiryController::class, 'store'])->name('inquiry.store');
Route::post('/inquiry/store', [InquiryController::class, 'store']);
Route::delete('/inquiry/destroy/{id}', [InquiryController::class, 'destroy'])->name('inquiry.destroy');

// FANZA
Route::controller(FanzaFreeMemoController::class)->group(function ()
{
    Route::get('fanzafreememo/store/{fanza_id}/{content_id}', 'store');
    Route::post('fanzafreememo/store/{fanza_id}/{content_id}', 'store');
    Route::delete('fanzafreememo/destroy/{id}', 'destroy');
});

Route::controller(FanzaReleaseMemoController::class)->group(function ()
{
    Route::get('fanzareleasememo/store/{fanza_id}/{content_id}', 'store');
    Route::post('fanzareleasememo/store/{fanza_id}/{content_id}', 'store');
    Route::put('/fanzareleasememo/update/{type}/{content_id}', 'update');
    Route::delete('fanzareleasememo/destroy/{id}', 'destroy');
});

Route::controller(FanzaPrivateMemoController::class)->group(function ()
{
    Route::get('fanzaprivatememo/store/{fanza_id}/{content_id}', 'store');
    Route::post('fanzaprivatememo/store/{fanza_id}/{content_id}', 'store');
    Route::put('/fanzaprivatememo/update/{type}/{content_id}', 'update');
    Route::delete('fanzaprivatememo/destroy/{id}', 'destroy');
});

Route::controller(FanzaListController::class)->group(function ()
{
    Route::get('fanza/video/all', 'index')->name('flist.index');
    Route::get('fanza/video/list', 'show')->name('flist.show');
    Route::get('fanza/video/genre', 'genre')->name('flist.genre');
    Route::get('fanza/video/maker', 'maker')->name('flist.maker');
    Route::get('fanza/video/actress', 'actress')->name('flist.actress');
    Route::get('fanza/video/series', 'series')->name('flist.series');
});

Route::controller(FanzaVideoController::class)->group(function ()
{
    Route::get('fanza/video/memotype', 'memotype')->name('fvideo.memotype');
    Route::get('fanza/create', 'create')->name('fvideo.create');
    Route::get('/fanza/video/{id}', 'show')->name('fvideo.show');
    Route::get('fanza/store', 'store')->name('fvideo.store');
    Route::post('fanza/store', 'store');
    Route::get('/fanza/video/edit/{type}/{content_id}/{memoid}', 'edit')->middleware(['auth', 'verified'])->name('fvideo.edit');
});

// DUGA
Route::controller(DugaFreeMemoController::class)->group(function ()
{
    Route::get('dugafreememo/store/{duga_id}/{productid}', 'store');
    Route::post('dugafreememo/store/{duga_id}/{productid}', 'store');
    Route::delete('dugafreememo/destroy/{id}', 'destroy');
});

Route::controller(DugaReleaseMemoController::class)->group(function ()
{
    Route::get('dugareleasememo/store/{duga_id}/{productid}', 'store');
    Route::post('dugareleasememo/store/{duga_id}/{productid}', 'store');
    Route::put('/dugareleasememo/update/{type}/{productid}', 'update');
    Route::delete('dugareleasememo/destroy/{id}', 'destroy');
});

Route::controller(DugaPrivateMemoController::class)->group(function ()
{
    Route::get('dugaprivatememo/store/{duga_id}/{productid}', 'store');
    Route::post('dugaprivatememo/store/{duga_id}/{productid}', 'store');
    Route::put('/dugaprivatememo/update/{type}/{productid}', 'update');
    Route::delete('dugaprivatememo/destroy/{id}', 'destroy');
});

Route::controller(DugaListController::class)->group(function ()
{
    Route::get('duga/video/all', 'index')->name('dlist.index');
    Route::get('duga/video/list', 'show')->name('dlist.show');
    Route::get('duga/video/category', 'category')->name('dlist.category');
    Route::get('duga/video/maker', 'maker')->name('dlist.maker');
    Route::get('duga/video/performer', 'performer')->name('dlist.performer');
    Route::get('duga/video/series', 'series')->name('dlist.series');
});

Route::controller(DugaVideoController::class)->group(function ()
{
    Route::get('duga/video/memotype', 'memotype')->name('dvideo.memotype');
    Route::get('duga/create', 'create')->name('dvideo.create');
    Route::get('/duga/video/{id}', 'show')->name('dvideo.show');
    Route::get('duga/store', 'store')->name('dvideo.store');
    Route::post('duga/store', 'store');
    Route::get('/duga/video/edit/{type}/{productid}/{memoid}', 'edit')->middleware(['auth', 'verified'])->name('dvideo.edit');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
