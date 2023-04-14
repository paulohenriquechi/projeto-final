<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;

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

Route::get('albums', [AlbumController::class, 'albums']);
Route::get('albums/{album}', [AlbumController::class, 'album']);
// Route::get('about', [...]); irá mostrar a biografia da banda

// irá mostrar todas as músicas da banda
Route::get('songs', [SongController::class, 'songs']);

// irá mostrar a música escolhida
Route::get('songs/{song}', [SongController::class, 'song']);

// ficou inutil, consegui transferir diretamente os dados das musicas
// Route::get('album/{albumSongs}', [AlbumController::class, 'albumSongs']);

// cadastro de usuário
Route::post('register', [UserController::class, 'register']);
// login de usuario
Route::post('login', [UserController::class, 'login']);
