<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return response()->json(['customers' => $customers], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $customer=  $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|max:255',
            'photo'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'address' => 'nullable|string|max:500',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $customer =  Customer::create( $customer);
        return response()->json(['customer' => $customer], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
       return response()->json(['customer' => $customer], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $customer=  $request->validate([
            'id'    =>   'required',
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|max:255',
            'photo'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'address' => 'nullable|string|max:500',
            'user_id' => 'nullable|exists:users,id',
        ]);

       $customer_save = Customer::findOrFail($id);

    // photo upload
    // if ($request->hasFile('photo')) {
    //     $data['photo'] = $request->file('photo')->store('customers', 'public');
    // }

    $customer_save->update($customer);

    return response()->json([
        'customer' => $customer_save
    ], 200);
       return response()->json(['customer' => $customer], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json("successfully deleted", 200);
    }
}
