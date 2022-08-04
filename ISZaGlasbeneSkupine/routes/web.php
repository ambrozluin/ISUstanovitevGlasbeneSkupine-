<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Show Register Form
Route::get('/register', [UserController::class, 'create']);
   
// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login');

// Create New User
Route::post('/users', [UserController::class, 'store']);

