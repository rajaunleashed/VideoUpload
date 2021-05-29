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
    return view('welcome');
});

Route::prefix('videos')->group(function() {
    Route::get('/', [\App\Http\Controllers\VideoController::class, 'index']);
    Route::get('upload', function() {
        return view('videos.upload');
    });

    Route::post('upload', [\App\Http\Controllers\VideoController::class, 'upload'])->name('video.upload');
});
