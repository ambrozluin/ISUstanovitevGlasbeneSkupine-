<?php

use App\Http\Controllers\GlasbenaskupinaController;
use App\Http\Controllers\InviteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

/*
// All Listings
Route::get('/', [ListingController::class, 'index']);
// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
*/

//---GLASBENE SKUPINE
// All Music groups
Route::get('/', [GlasbenaskupinaController::class, 'index']);

// Show Create Form
Route::get('/glasbeneskupine/create', [GlasbenaskupinaController::class, 'create'])->middleware('auth');

// Store Music Group Data
Route::post('/glasbeneskupine', [GlasbenaskupinaController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/glasbeneskupine/{glasbenaskupina}/edit', [GlasbenaskupinaController::class, 'edit'])->middleware('auth');

// Update Music Group
Route::put('/glasbeneskupine/{glasbenaskupina}', [GlasbenaskupinaController::class, 'update'])->middleware('auth');

// Delete Music Group
Route::delete('/glasbeneskupine/{glasbenaskupina}', [GlasbenaskupinaController::class, 'destroy'])->middleware('auth');

// Manage Music Group
Route::get('/glasbeneskupine/manage', [GlasbenaskupinaController::class, 'manage'])->middleware('auth');

// Single Music Group
Route::get('/glasbeneskupine/{glasbenaskupina}', [GlasbenaskupinaController::class, 'show']);




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

// List all users
Route::get('/users/listall', [UserController::class, 'listall'])->middleware('auth');


//POVABILA

//Show invites
Route::get('/invites', [InviteController::class, 'invites'])->middleware('auth');

// Invite user id
Route::get('/invite/{user}', [InviteController::class, 'inviteuser'])->middleware('auth');

// Invite user to group
Route::get('/invite/{user}/{group}', [InviteController::class, 'inviteToGroup'])->middleware('auth')->name('inviteToGroup');

// acceptInvite
Route::get('/invites/{invite}', [InviteController::class, 'accept'])->middleware('auth')->name('accept');

// Store invite
Route::post('/invite/store', [InviteController::class, 'store'])->middleware('auth');

// {token} is a required parameter that will be exposed to us in the controller method
Route::get('/accept/{token}', [InviteController::class, 'accept']);
