<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('albums', [AlbumController::class, 'show']);
Route::get('albums/{album}', [AlbumController::class, 'album']);
// Route::get('about', [...]); irá mostrar a biografia da banda
// Route::get('songs', [...]); irá mostrar todas as músicas da banda
// Route::get('songs/{song}', [...]); irá mostrar a música escolhida
