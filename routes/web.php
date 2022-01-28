<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DriverLatlongController;
use App\Http\Controllers\OnGoingOrdersController;

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
Route::get('/', [AdminController::class, 'loginPage']);

Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index']);
        Route::get('/manage-drivers', [AdminController::class, 'drivers']);
        Route::get('/manage-items', [AdminController::class, 'items']);
        Route::get('/manage-customers', [AdminController::class, 'customers']);
        Route::get('/ongoing-orders', [AdminController::class, 'ongoing_orders']);
        Route::get('/all-orders', [AdminController::class, 'all_orders']);
        Route::get('/configuration', [AdminController::class, 'configuration']);
        Route::get('/templates', [AdminController::class, 'templates']);
        Route::get('/logout', [AdminController::class, 'destroy']);


        Route::get('/add-drivers', [DriverController::class, 'index']);

        Route::get('/add-items', [ItemsController::class, 'index']);

        Route::post('/Order/RejectOrder/{id}', [OnGoingOrdersController::class, 'store']);

        Route::post('/add-drivers', [DriverController::class, 'store']);
        Route::post('/add-items', [ItemsController::class, 'store']);

        Route::post('/status-one/{id}', [ItemsController::class, 'one']);
        Route::post('/status-zero/{id}', [ItemsController::class, 'zero']);

        Route::post('/driver-status-one/{id}', [DriverController::class, 'one']);
        Route::post('/driver-status-zero/{id}', [DriverController::class, 'zero']);

        Route::post('/customer-status-one/{id}', [CustomerController::class, 'one']);
        Route::post('/customer-status-zero/{id}', [CustomerController::class, 'zero']);

        Route::get('/update-configuration', [ConfigurationController::class, 'index']);
        Route::get('/update-configuration/{id}', [ConfigurationController::class, 'indexx']);

        Route::post('/add-configurations', [ConfigurationController::class, 'store']);
        Route::post('/add-configurations/{id}', [ConfigurationController::class, 'store']);
    });
});

Route::get('/assignOrder', [DriverLatlongController::class, 'create']);

Route::get('/admin-login', [AdminController::class, 'loginPage'])->name('admin.login');
Route::post('/login', [AdminController::class, 'authenticate']);
