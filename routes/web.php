<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FangaController;
use App\Http\Controllers\FanzaVideoController;
use App\Http\Controllers\FanzaFreeMemoController;
use App\Http\Controllers\FanzaReleaseMemoController;
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

Route::controller(FanzaVideoController::class)->group(function ()
{
    Route::get('fanza/create', 'create')->name('fvideo.create');
    Route::get('fanza/store', 'store')->name('fvideo.store');
    Route::post('fanza/store', 'store');
    Route::get('/fanza/video/edit/{type}/{content_id}/{memoid}', 'edit')->middleware(['auth', 'verified'])->name('fvideo.edit');
    Route::get('/fanza/video/{id}', 'show')->name('fvideo.show');
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
