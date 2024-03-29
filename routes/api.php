<?php

use App\Http\Controllers\DegreeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

Route::get('/degrees', [DegreeController::class, 'index']);

Route::controller(UserController::class)->group(function () {
	Route::get('/cvs/{token:token}', 'index');
	Route::get('/cv/{token:token}/{id}', 'get');
	Route::post('/cvs', 'store');
});
