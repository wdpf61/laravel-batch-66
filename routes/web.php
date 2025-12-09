<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Hello World";
});

Route::get("/harun", function(){
     return "Hello Harun or Rashid";
});

Route::get( "/students/", function(){
   return view("students");
});


Route::get( "/student/{name}/{id}", function($name,$id){

   // return "Student Id is {$id} and His name is {$name} ";
    $student =["Hasan", "Masud", "M A Jalil", "Mashrur"];
   return view("students", ["id"=> $id,"name"=>$name ,"student"=>$student]);
   
});
