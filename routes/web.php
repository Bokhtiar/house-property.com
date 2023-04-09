<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

/* jetStream routes */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/* roles */
Route::resource('role', RoleController::class);

/* permission */
Route::resource('permission', PermissionController::class);

Route::resource('property', PropertyController::class);

/* property */
Route::prefix('property')->group(function () {
    /*property first step*/ 
    Route::get('/first/step', [PropertyController::class, 'first_step']);
    Route::post('/first/step/store', [PropertyController::class, 'first_step_store']);
    /*property second step*/ 
    Route::get('/second/step', [PropertyController::class, 'second_step']);
    Route::post('/second/step/store', [PropertyController::class, 'second_step_store']);

});


