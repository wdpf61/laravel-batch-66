<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get("customers", [CustomerController::class, "index"]);


Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});


Route::middleware('auth:sanctum')->group( function () {
   Route::apiResource("customers", CustomerController::class);
});


Route::apiResource("users", UserController::class);

//  Route::apiResource("customers", CustomerController::class);
 Route::get("customers",[ CustomerController::class,"index"]);

 Route::apiResource("roles", RoleController::class);
