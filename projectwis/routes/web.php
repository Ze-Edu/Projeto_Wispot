<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalenderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

Route::get('calendar-event', [CalenderController::class, 'index']);
Route::post('calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);

Route::view('atv','atv');
Route::view('home','home');