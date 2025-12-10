<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Hello World";
});

Route::get("/harun", function(){
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

Route::get("/customers", [CustomerController::class, "index"]);
Route::get("/student", [StudentController::class, 'index']);
Route::get("/student/create", [StudentController::class, 'create']);
Route::get("/student/find/{id}", [StudentController::class, 'find']);
Route::get("/student/edit/{id}", [StudentController::class, 'edit']);
Route::get("/student/update/{id}/{name}", [StudentController::class, 'update']);
Route::get("/student/delete/{id}", [StudentController::class, 'delete']);



Route::fallback(function(){
   return "404 No Route matched";
});
//   php artisan make:controller StudentController

// user  ->  request  ->  controller -> model    -> database