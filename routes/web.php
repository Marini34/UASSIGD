<?php

use App\Http\Controllers\Api\PlaceApiController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PlaceMapController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/', [PlaceMapController::class, 'index'])->name('frontpage');

Route::get('/places/data', [DataController::class, 'places'])->name('places.data'); // DATA TABLE CONTROLLER
Route::get('/places/api', [PlaceApiController::class, 'index'])->name('places.api'); // DATA TABLE CONTROLLER

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('places', PlaceController::class);
});
