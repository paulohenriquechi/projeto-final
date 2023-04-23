<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ReviewController;
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


// Route::post('user', [UserController::class, 'getUser']);


//rotas publicas

// fazer cadastro
Route::post('register', [UserController::class, 'register']);
// fazer login
Route::post('login', [UserController::class, 'login']);
// ver albums
Route::get('albums', [AlbumController::class, 'albums']);
// ver album especifico
Route::get('albums/{album}', [AlbumController::class, 'album']);
// ver musicas
Route::get('songs', [SongController::class, 'songs']);
// ver musica especifica
Route::get('songs/{song}', [SongController::class, 'song']);
// ver reviews
Route::get('getReviews/{album}', [ReviewController::class, 'getReviews']);


//rotas protegidas

//fazer review
Route::middleware('auth:sanctum')->post('setReview', [ReviewController::class, 'setReview']);
// verifica se o usuario está logado
Route::middleware('auth:sanctum')->post('auth', [UserController::class, 'authUser']);
// desloga o usuario
Route::middleware('auth:sanctum')->post('logout', [UserController::class, 'logout']);
// ver reviews do usuário
Route::middleware('auth:sanctum')->get('getUserReviews/{id}', [ReviewController::class, 'getUserReviews']);