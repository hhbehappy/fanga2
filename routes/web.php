<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FangaController;
use App\Http\Controllers\Fanza\FanzaVideoController;
use App\Http\Controllers\Fanza\FanzaListController;
use App\Http\Controllers\Fanza\FanzaActressController;
use App\Http\Controllers\Fanza\FanzaGenreController;
use App\Http\Controllers\Fanza\FanzaMakerController;
use App\Http\Controllers\Fanza\FanzaSeriesController;
use App\Http\Controllers\Fanza\FanzaFreeMemoController;
use App\Http\Controllers\Fanza\FanzaReleaseMemoController;
use App\Http\Controllers\Fanza\FanzaPrivateMemoController;
use App\Http\Controllers\Duga\DugaVideoController;
use App\Http\Controllers\Duga\DugaListController;
use App\Http\Controllers\Duga\DugaPerformerController;
use App\Http\Controllers\Duga\DugaCategoryController;
use App\Http\Controllers\Duga\DugaMakerController;
use App\Http\Controllers\Duga\DugaSeriesController;
use App\Http\Controllers\Duga\DugaFreeMemoController;
use App\Http\Controllers\Duga\DugaReleaseMemoController;
use App\Http\Controllers\Duga\DugaPrivateMemoController;
use App\Http\Controllers\NiceController;
use App\Http\Controllers\Bbs\ThreadController;
use App\Http\Controllers\Bbs\CommentController;
use App\Http\Controllers\Bbs\RedirectbackController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\SitemapController;

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

Route::controller(FangaController::class)->group(function ()
{
    Route::get('/', 'index')->name('fanga');
    // 規約関係
    Route::get('/info/about', 'about')->name('about');
    Route::get('/info/privacy', 'privacy')->name('privacy');
    Route::get('/info/rule', 'rule')->name('rule');
    // ログアウト
    Route::get('/logout',  'logout')->name('fanga.logout');
    // 検索ページ
    Route::get('/search/fanza', 'searchfanza')->name('fanga.searchfanza');
    Route::get('/search/duga', 'searchduga')->name('fanga.searchduga');
});

// サイトマップ
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::group(['prefix' => 'sitemap'], function () {
    Route::get('fanza.xml', [SitemapController::class, 'fanza']);
    Route::get('duga.xml', [SitemapController::class, 'duga']);
});

// マイページ
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/mypage', [ProfileController::class, 'edit'])->name('mypage');
    Route::patch('/mypage', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/mypage', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 気になる動画機能
Route::controller(NiceController::class)->group(function ()
{
    Route::get('/nice/{content_id}/{fanza_id}/{duga_id}/{type}', 'nice')->name('nice');
    Route::post('/nice/{content_id}/{fanza_id}/{duga_id}/{type}', 'nice');
    Route::get('/unnice/{content_id}', 'unnice')->name('unnice');
    Route::post('/unnice/{content_id}', 'unnice');
});

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
Route::controller(InquiryController::class)->group(function ()
{
    Route::get('/inquiry', 'index')->name('inquiry');
    Route::get('/inquiry/store', 'store')->name('inquiry.store');
    Route::post('/inquiry/store', 'store');
});

// FANZA
Route::controller(FanzaFreeMemoController::class)->group(function ()
{
    Route::get('fanzafreememo/store/{fanza_id}/{content_id}', 'store');
    Route::post('fanzafreememo/store/{fanza_id}/{content_id}', 'store');
    Route::delete('fanzafreememo/destroy/{id}', 'destroy');
});

Route::controller(FanzaReleaseMemoController::class)->group(function ()
{
    Route::get('fanza/video/memo/all', 'index')->name('fmemo.index');
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
    Route::delete('fanza/destroy/{id}', 'destroy')->name('flist.destroy');
});

Route::controller(FanzaActressController::class)->group(function ()
{
    Route::get('fanza/video/actress', 'actress')->name('flist.actress');
    Route::get('fanza/video/actress/name', 'actress_name')->name('flist.actress_name');
    Route::get('fanza/video/actress/ruby', 'actress_ruby')->name('flist.actress_ruby');
    Route::get('fanza/video/actress/memo', 'actress_memo')->name('flist.actress_memo');
    Route::get('fanza/video/actress/nice', 'actress_nice')->name('flist.actress_nice');
});

Route::controller(FanzaGenreController::class)->group(function ()
{
    Route::get('fanza/video/genre', 'genre')->name('flist.genre');
});

Route::controller(FanzaMakerController::class)->group(function ()
{
    Route::get('fanza/video/maker', 'maker')->name('flist.maker');
    Route::get('fanza/video/maker/all', 'maker_all')->name('flist.maker_all');
    Route::get('fanza/video/maker/search', 'maker_search')->name('flist.maker_search');
    Route::get('fanza/video/maker/memo', 'maker_memo')->name('flist.maker_memo');
    Route::get('fanza/video/maker/nice', 'maker_nice')->name('flist.maker_nice');
});

Route::controller(FanzaSeriesController::class)->group(function ()
{
    Route::get('fanza/video/series', 'series')->name('flist.series');
    Route::get('fanza/video/series/all', 'series_all')->name('flist.series_all');
    Route::get('fanza/video/series/search', 'series_search')->name('flist.series_search');
    Route::get('fanza/video/series/memo', 'series_memo')->name('flist.series_memo');
    Route::get('fanza/video/series/nice', 'series_nice')->name('flist.series_nice');
});

Route::controller(FanzaVideoController::class)->group(function ()
{
    Route::get('fanza/create', 'create')->middleware('auth', 'Id1Middleware');
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
    Route::get('duga/video/memo/all', 'index')->name('dmemo.index');
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
    Route::delete('duga/destroy/{id}', 'destroy')->name('dlist.destroy');
});

Route::controller(DugaPerformerController::class)->group(function ()
{
    Route::get('duga/video/performer', 'performer')->name('dlist.performer');
    Route::get('duga/video/performer/name', 'performer_name')->name('dlist.performer_name');
    Route::get('duga/video/performer/ruby', 'performer_ruby')->name('dlist.performer_ruby');
    Route::get('duga/video/performer/memo', 'performer_memo')->name('dlist.performer_memo');
    Route::get('duga/video/performer/nice', 'performer_nice')->name('dlist.performer_nice');
});

Route::controller(DugaCategoryController::class)->group(function ()
{
    Route::get('duga/video/category', 'category')->name('dlist.category');
});

Route::controller(DugaMakerController::class)->group(function ()
{
    Route::get('duga/video/maker', 'maker')->name('dlist.maker');
    Route::get('duga/video/maker/all', 'maker_all')->name('dlist.maker_all');
    Route::get('duga/video/maker/search', 'maker_search')->name('dlist.maker_search');
    Route::get('duga/video/maker/memo', 'maker_memo')->name('dlist.maker_memo');
    Route::get('duga/video/maker/nice', 'maker_nice')->name('dlist.maker_nice');
});

Route::controller(DugaSeriesController::class)->group(function ()
{
    Route::get('duga/video/series', 'series')->name('dlist.series');
    Route::get('duga/video/series/all', 'series_all')->name('dlist.series_all');
    Route::get('duga/video/series/search', 'series_search')->name('dlist.series_search');
    Route::get('duga/video/series/memo', 'series_memo')->name('dlist.series_memo');
    Route::get('duga/video/series/nice', 'series_nice')->name('dlist.series_nice');
});

Route::controller(DugaVideoController::class)->group(function ()
{
    Route::get('duga/create', 'create')->middleware('auth', 'Id1Middleware');
    Route::get('/duga/video/{id}', 'show')->name('dvideo.show');
    Route::get('duga/store', 'store')->name('dvideo.store');
    Route::post('duga/store', 'store');
    Route::get('/duga/video/edit/{type}/{productid}/{memoid}', 'edit')->middleware(['auth', 'verified'])->name('dvideo.edit');
});

require __DIR__.'/auth.php';
