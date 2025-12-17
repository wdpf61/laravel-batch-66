<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    function index()
    {
        // $customers = Customer::all()->toArray();
        // echo '<pre>';
        // print_r( $customers);
        // echo '</pre>';
        // return view("customer.index", ["customers"=>$customers]);

        //  query builder
        // $customers= DB::table("customers")->get();
        // $customers= DB::select("select * from lav_customers");

        $customers = Customer::orderBy("id","desc")->paginate(8);
        return view("customer.index", compact("customers"));
    }



    function create(){
        return view("customer.create");
    }
    function edit($id){
        $customer = Customer::find($id);
        return view("customer.edit", compact("customer"));
    }


    function save(Request $request){
      print_r($request->all());

      $customer= new Customer();
      $customer->name= $request->name;
      $customer->email= $request->email;
      $customer->phone= $request->phone;
      $customer->address= $request->address;
    //   $customer->photo= $request->photo;
      $customer->save();

    //   echo "saved";
     return redirect("customer");
    }


    function update(Request $request, $id){
      print_r($request->all());

      $customer= Customer::find($id);
      $customer->name= $request->name;
      $customer->email= $request->email;
      $customer->phone= $request->phone;
      $customer->address= $request->address;
     //   $customer->photo= $request->photo;
      $customer->update();

      //   echo "saved";
     return redirect("customer");
    }



    function delete($id){
      //  Customer::find($id)->delete();
       $customer = Customer::find($id);
       $customer->delete();
       return redirect("customer");
    }
}
