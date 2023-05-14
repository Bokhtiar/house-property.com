<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\MaintainerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TenantController;
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



/* property */
Route::resource('property', PropertyController::class);
Route::prefix('property')->group(function () {
    /*property first step*/ 
    Route::get('/first/step', [PropertyController::class, 'first_step']);
    Route::get('/first/step/prev', [PropertyController::class, 'first_step_prev']);
    Route::post('/first/step/store', [PropertyController::class, 'first_step_store']);
    Route::put('/first/step/update/{id}', [PropertyController::class, 'first_step_update']);

    /*property second step*/ 
    Route::get('/second/step', [PropertyController::class, 'second_step']);
    Route::post('/second/step/store', [PropertyController::class, 'second_step_store']);
    Route::get('/second/step/edit/{id}', [PropertyController::class, 'second_step_edit']);
    Route::put('/second/step/update/{id}', [PropertyController::class, 'second_step_update']);
 
    /*property third step*/ 
    Route::get('/third/step', [PropertyController::class, 'third_step']);
    Route::post('/third/step/store', [PropertyController::class, 'third_step_store']);
    Route::get('/third/step/edit/{id}', [PropertyController::class, 'third_step_edit']);
    Route::put('/third/step/update/{id}', [PropertyController::class, 'third_step_update']);

    /*property fourth step*/ 
    Route::get('/fourth/step', [PropertyController::class, 'fourth_step']);
    Route::post('/fourth/step/store', [PropertyController::class, 'fourth_step_store']);
    Route::get('/fourth/step/edit/{id}', [PropertyController::class, 'fourth_step_edit']);
    Route::put('/fourth/step/update/{id}', [PropertyController::class, 'fourth_step_update']);

    /* destroy */
    Route::get('/destroy/{id}', [PropertyController::class, 'destroy']);
    
});

/* tenant */
Route::resource('tenant', TenantController::class);
Route::prefix('tenant')->group(function () {
    /*tenent first step*/ 
    Route::get('/first/step', [TenantController::class, 'first_step']);
    Route::get('prev/first/step', [TenantController::class, 'first_step_prev']);
    Route::get('/first/step/prev', [TenantController::class, 'first_step_prev']);
    Route::post('/first/step/store', [TenantController::class, 'first_step_store']);
    Route::get('/first/step/edit/{id}', [TenantController::class, 'first_step_edit']);
    Route::put('/first/step/update/{id}', [TenantController::class, 'first_step_update']);
    /*property second step*/ 
    Route::get('/second/step', [TenantController::class, 'second_step']);
    Route::post('/second/step/store', [TenantController::class, 'second_step_store']);
    Route::get('/second/step/edit/{id}', [TenantController::class, 'second_step_edit']);
    Route::put('/second/step/update/{id}', [TenantController::class, 'second_step_update']);
    /*property third step*/ 
    Route::get('/third/step', [TenantController::class, 'third_step']);
    Route::post('/third/step/store', [TenantController::class, 'third_step_store']);
    Route::get('/third/step/edit/{id}', [TenantController::class, 'third_step_edit']);
    Route::put('/third/step/update/{id}', [TenantController::class, 'third_step_update']);
    /* destroy */
    Route::get('/destroy/{id}', [PropertyController::class, 'destroy']);
});

 
/* bill */
Route::resource('bill', BillController::class);

/* maintainer */
Route::resource('maintainer', MaintainerController::class);
