<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\VerificationController;

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

Auth::routes();
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return redirect('admin');
});


Route::group(['middleware' => 'admin', 'auth'], function () {
    Route::prefix('/admin')->group(function () {
        /* error dashboard list */
        Route::get('', [HomeController::class, 'index'])
            ->name('admin.dashboard');
        /* error route list */
        Route::get('/error/403', [HomeController::class, 'error_403'])
            ->name('error.403');
        /* permission route list */
        Route::middleware('permission:permission-list')->group(function () {
            Route::apiresource('permission', PermissionController::class,
                ['except' => ['show', 'update', 'destroy']])
                ->parameters(['permission' => 'id']);
            Route::prefix('/permission')->name('permission.')->group(function () {
                Route::post('/{id}', [PermissionController::class, 'update'])
                    ->middleware('permission:permission-edit')->name('update');
                Route::get('/{id}', [PermissionController::class, 'show'])->name('show');
            });
        });
        /* role route list */
        Route::middleware('permission:role-list')->group(function () {
            Route::resource('role', RoleController::class,
                ['except' => ['show', 'update', 'destroy']])
                ->parameters(['role' => 'id']);
            Route::prefix('/role')->name('role.')->group(function () {
                Route::post('/{id}', [RoleController::class, 'update'])
                    ->middleware('permission:role-edit')->name('update');
                Route::get('/{id}', [RoleController::class, 'show'])->name('show');
            });
        });
        /* user route list */
        Route::middleware('permission:user-list')->group(function () {
            Route::resource('user', UserController::class,
                ['except' => ['show', 'update', 'destroy']])
                ->parameters(['user' => 'id']);
            Route::prefix('/user')->name('user.')->group(function () {
                Route::post('/{id}', [UserController::class, 'update'])
                    ->middleware('permission:user-edit')->name('update');
                Route::get('/{id}', [UserController::class, 'show'])->name('show');
            });
        });
        /* sale route list */
            Route::apiresource('sale', SaleController::class,
                ['except' => ['show', 'update', 'destroy']])
                ->parameters(['sale' => 'id']);
            Route::prefix('/sale')->name('sale.')->group(function () {
                Route::get('/{id}', [SaleController::class, 'show'])->name('show');
            });
        /* config route list */
            Route::apiresource('config', ConfigController::class,
                ['except' => ['show', 'update', 'destroy']])
                ->parameters(['config' => 'id']);
            Route::prefix('/config')->name('config.')->group(function () {
                Route::post('/{id}', [ConfigController::class, 'update'])->name('update');
                Route::get('/{id}', [ConfigController::class, 'show'])->name('show');
            });
    });
});
Route::get('verify', [VerificationController::class, 'index'])
    ->name('verify.index');
Route::post('verify', [VerificationController::class, 'verifyDone'])
    ->name('verify.done');

