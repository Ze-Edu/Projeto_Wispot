<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FullCalenderController;

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
    return view('home');
});

Route::get('full-calender', [FullCalenderController::class, 'index']);

Route::post('full-calender/action', [FullCalenderController::class, 'action']);

Route::view('atv','atv');
Route::view('home','home');