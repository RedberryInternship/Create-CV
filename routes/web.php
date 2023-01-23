<?php

use App\Http\Controllers\TokenController;
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

Route::view('swagger', 'swagger')->name('swagger');

Route::get('/', function () {
	return view('token', [
		'token' => '',
	]);
});

Route::post('/', [TokenController::class, 'generate_token']);
