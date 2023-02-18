<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', function () {
    return view('layouts.home');
});
Route::resource('/projects', ProjectController::class);
Route::resource('/clients', ClientController::class);

/*
Route::get('home', function(){
    return view('main');
});
Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
*/