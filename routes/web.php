<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\RentPaymentController;
use App\Http\Controllers\TenantApplicationController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TenantMateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaterPaymentController;
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



# Unprotected routes

//Auth::routes(['verify' => true]);

# 1. Default route to '/'
Route::get('/', [DashboardController::class, 'index'])->name('index');


# Protected routes
Route::group(['middleware' => ['auth:sanctum', 'verified'], 'as' => 'admin.'], function () {

    # Home page
    Route::get('/home', [DashboardController::class, 'home'])->name('home');

    # 1. USERS

    # User accounts
    Route::get('/users', [UserController::class, 'index'])->name('users');

    # Verify user account
    Route::post('/verify/user/{user}', [UserController::class, 'verifyUser'])->name('verifyUser');

    # Delete user account
    Route::delete('/delete/user/{user}', [UserController::class, 'deleteUser'])->name('deleteUser');

    # 2. TENANTS
    Route::resource('tenants', TenantController::class);

    # 3. TENANT MATES
    Route::resource('tenant_mates', TenantMateController::class);

    # 4. REFEREES
    Route::resource('referees', RefereeController::class);

    # 5. EMPLOYERS
    Route::resource('employers', EmployerController::class);

    # 6. APARTMENTS
    Route::resource('apartments', ApartmentController::class);

    # 7. DEPOSITS
    Route::resource('deposits', DepositController::class);

    # 8. RENT PAYMENTS
    Route::resource('rent_payments', RentPaymentController::class);

    # 9. WATER PAYMENTS
    Route::resource('water_payments', WaterPaymentController::class);

    # 10. DOCUMENTS
    Route::resource('documents', DocumentController::class);

    # 11. TENANT APPLICATIONS
    Route::resource('applications', TenantApplicationController::class);

});
