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
// use App\Http\Controllers\DugaListController;
use App\Http\Controllers\DugaFreeMemoController;
use App\Http\Controllers\DugaReleaseMemoController;
// use App\Http\Controllers\DugaPrivateMemoController;
use App\Http\Controllers\NiceController;
// use App\Http\Controllers\Duga\VideoController;

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

// 気になる動画機能
Route::get('/nice/{content_id}/{fanza_id}/{duga_id}/{type}', [NiceController::class, 'nice'])->name('nice');
Route::post('/nice/{content_id}/{fanza_id}/{duga_id}/{type}', [NiceController::class, 'nice']);
Route::get('/unnice/{content_id}', [NiceController::class, 'unnice'])->name('unnice');
Route::post('/unnice/{content_id}', [NiceController::class, 'unnice']);

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

Route::controller(DugaVideoController::class)->group(function ()
{
    Route::get('duga/video/memotype', 'memotype')->name('dvideo.memotype');
    Route::get('duga/create', 'create')->name('dvideo.create');
    Route::get('/duga/video/{id}', 'show')->name('dvideo.show');
    Route::get('duga/store', 'store')->name('dvideo.store');
    Route::post('duga/store', 'store');
    Route::get('/duga/video/edit/{type}/{productid}/{memoid}', 'edit')->middleware(['auth', 'verified'])->name('dvideo.edit');
});

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
