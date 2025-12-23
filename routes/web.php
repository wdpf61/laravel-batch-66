<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("pages.erp.dashboard.index");
});
Route::get('/test', function () {
    return view("pages.erp.dashboard.test");
});

Route::get("/harun", function () {
    return "Hello Harun or Rashid";
});

// Route::get( "/students/", function(){
//    return view("students");
// });


// Route::get( "/student/{name}/{id}", function($name,$id){
//    // return "Student Id is {$id} and His name is {$name} ";
//    $student =["Hasan", "Masud", "M A Jalil", "Mashrur"];
//    return view("students", ["id"=> $id,"name"=>$name ,"student"=>$student]);

// });

// Route::get("/customers", [CustomerController::class, "index"]);
Route::get("/student", [StudentController::class, 'index']);
Route::get("/student/create", [StudentController::class, 'create']);
Route::get("/student/find/{id}", [StudentController::class, 'find']);
Route::get("/student/edit/{id}", [StudentController::class, 'edit']);
Route::get("/student/update/{id}/{name}", [StudentController::class, 'update']);
Route::get("/student/delete/{id}", [StudentController::class, 'delete']);


Route::prefix("customer")->controller(CustomerController::class)->group(function () {
    Route::get("/", "index");
    Route::get("create", "create");
    Route::post("save", "save");
    Route::delete("delete/{id}", "delete");
    Route::get("edit/{id}", "edit");
    Route::post("update/{id}", "update");
    Route::get("trashed", "trashed");
    Route::get("restore/{id}", "restore");
    Route::delete("force-delete/{id}", "force_delete");
});

Route::prefix("system")->group(function () {
    Route::get("users/trashed", [UserController::class,"trashed"])->name("user.trashed");
    Route::get("users/restore/{id}", [UserController::class,"restore"])->name("user.restore");
    Route::delete("users/force-delete/{id}", [UserController::class,"force_delete"])->name("user.delete");
    Route::resource('users', UserController::class);
});



Route::fallback(function () {
    return "404 No Route matched";
});
//   php artisan make:controller StudentController

// user  ->  request  ->  controller -> model    -> database
