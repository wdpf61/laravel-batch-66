<?php

use App\Facades\Payment;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassnameController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Mail\UserNotification;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



//  class Car{
//         public $name="Corolla";
//         function nameCart(){
//             return $this->name;
//         }
//     }

//     app()->bind(Car::class);

//   dd(app());

Route::get('/', function () {

    // // $payment= new PaymentService();
    // // $payment->pay();
    // // app(PaymentService::class)->pay();
    //  Payment::pay();

     $users= User::ByRole(2)->get();
     return response()->json($users);

});




Route::get('/test', function () {
    return view("pages.erp.dashboard.test");
});


// Route::get("/email", [StudentController::class, 'email']);

 Route::get("sendmail", [CustomerController::class, "sendmail"]);


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
    Route::get("find/{id}", "find");
});

Route::prefix("system")->middleware(["auth", "admin"])->group(function () {
    Route::get("users/trashed", [UserController::class,"trashed"])->name("user.trashed");
    Route::get("users/restore/{id}", [UserController::class,"restore"])->name("user.restore");
    Route::delete("users/force-delete/{id}", [UserController::class,"force_delete"])->name("user.delete");
    Route::resource('users', UserController::class);
});

Route::get("class", [ClassnameController::class,"index"]);


Route::fallback(function () {
    return "404 No Route matched";
});
//   php artisan make:controller StudentController

// user  ->  request  ->  controller -> model    -> database

Auth::routes();

Route::match(['get', 'post'],'/logout', [LoginController::class,'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("orders", OrderController::class);
