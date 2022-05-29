<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    $videos = Models\videos::all();
    return view('welcome', compact('videos'));
});
Route::get('/videolist/create', [VideolistController::class, 'create'])->name('videolist.create');
Route::post('/videolist', [VideolistController::class, 'store'])->name('videolist.store');
Route::get('/videolist/{videolist}/edit', [VideolistController::class, 'edit'])->name('videolist.edit');
Route::patch('/videolist/{videolist}', [VideolistController::class, 'update'])->name('videolist.update');
Route::delete('/videolist/{videolist}', [VideolistController::class, 'destroy'])->name('videolist.destroy');

# Routes for videos
Route::get('/videolist/{videolist}/videos', [VideoController::class, 'index'])->name('video.index');
Route::get('/videolist/{videolist}/videos/create', [VideoController::class, 'create'])->name('video.create');
Route::post('/videolist/{videolist}/videos', [VideoController::class, 'store'])->name('video.store');
Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('video.edit');
Route::patch('/videos/{video}', [VideoController::class, 'update'])->name('video.update');
Route::delete('videos/{video}', [VideoController::class, 'destroy'])->name('video.destroy');