<?php

use App\Http\Controllers\DashboardController;
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



# Unprotected routes

# 1. Default route to '/'
Route::get('/', [DashboardController::class, 'index'])->name('index');


# Protected routes
Route::group(['middleware' => ['auth:sanctum', 'verified'], 'as' => 'admin.'], function () {

    # Home page
    Route::get('/home', [DashboardController::class, 'home'])->name('home');

});
