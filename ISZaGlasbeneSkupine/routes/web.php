<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GlasbenaSkupinaController;
use App\Models\Glasbenaskupina;

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
    return view('index');
});


//---GLASBENE SKUPINE
// Show Create Form
Route::get('/glasbeneskupine/create', [GlasbenaSkupinaController::class, 'create'])->middleware('auth');

// Store music group and data
Route::post('/glasbeneskupine', [GlasbenaSkupinaController::class, 'store'])->middleware('auth');




//UPORABNIKI IN REGISTRACIJA
// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// All Listings
//Route::get('/', [Glasbenaskupina::class, 'index']);



// Single Listing
//Route::get('/glasbeneskupine/{glasbenaskupina}', [Glasbenaskupina::class, 'show']);