<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use function Symfony\Component\Clock\now;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        $products = Product::all();

        return view("pages.erp.invoice.order", compact("customers", "products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->order_date = now();
        $order->save();

        foreach ($request->product as $key => $p) {
            $order_details = new OrderDetail();
            $order_details->order_id = $order->id;
            $order_details->product_id = $p['id'];
            $order_details->qty = $p['qty'];
            $order_details->price = $p['price'];
            $order_details->discount = $p['discount'];
            $order_details->save();

            $stock = new Stock();
            $stock->product_id = $p['id'];
            $stock->qty = $p['qty'] * -1;
            $stock->transaction_type_id = 1;
            $stock->warehouse_id = 1;

            $stock->save();
        }

        $order1= Order::with(["customer", "order_details", "order_details.product"])->find($order->id);
        $customer= Customer::find($request->customer_id);

        Mail::to($customer->email)->send(new OrderMail($order1));

        return response()->json($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $customer= Customer::find($order->customer_id);
        // $order_details= OrderDetail::where("order_id","=",$order->id)->get();
        // return view("pages.erp.invoice.orderDetails", compact("order","customer","order_details"));

       $order= Order::with(["customer", "order_details", "order_details.product"])->find($id);

    //    return $order;
       return view("pages.erp.invoice.orderDetails", compact("order"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
