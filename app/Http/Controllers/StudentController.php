<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
   
   function index(){
       return view("student.index");
   }

   function create(){
       return view("student.create");
   }


   function save(Request $request){
       return "student Created Successfully";
   }

   function find($id){
       return "student find $id";
   }


   function edit($id){
       return view("student.edit");
   }


   function update(Request $request){
       $id = $request->id;
       $name=$request->name;
       return "student id is $id and his name is $name";
   }


   function delete($id){
       return " $id student deleted Successfully";
   }


}
