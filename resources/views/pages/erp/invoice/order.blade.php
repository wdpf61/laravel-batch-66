@extends('layout.erp.app')
@section('css')
    <style>
        body {
            background: #f8f9fa;
        }

        .invoice-box {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
        }

        .invoice-title {
            font-size: 28px;
            font-weight: bold;
        }

        .table th {
            background: #f1f1f1;
        }
    </style>
@endsection
@section('content')
    <div class="container my-5">
        <div class="invoice-box shadow-sm">

            <!-- Header -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h2 class="invoice-title">INVOICE</h2>
                    <p class="mb-0"><strong>Invoice #:</strong> INV-001</p>
                    <p><strong>Date:</strong> 06 Jan 2026</p>
                </div>
                <div class="col-md-6 text-end">
                    <h5>Your Company Name</h5>
                    <p class="mb-0">Dhaka, Bangladesh</p>
                    <p class="mb-0">Email: info@company.com</p>
                    <p>Phone: +880 1234 567890</p>
                </div>
            </div>

            <!-- Billing Info -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6>Billed To:</h6>
                    <p class="mb-0">
                        <select class="form-select" name="customer" id="customer_id">
                            <option value="">Select Customer</option>
                            @forelse ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @empty
                                <option value="">Data Not Found</option>
                            @endforelse
                        </select>

                    </p>
                    <p class="mb-0 customer_address">Customer Address</p>
                    <p>Email: <span class="customer_email"> customer@gmail.com</span></p>
                </div>
                <div class="col-md-6 text-end">
                    <h6>Payment Method:</h6>
                    <p>Cash / Bank / Mobile Banking</p>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th>Item</th>
                            <th class="text-end">Price</th>
                            <th class="text-end">Qty</th>
                            <th class="text-end">Discount</th>
                            <th class="text-end">subtotal</th>
                            <th class="text-end">Action</th>
                        </tr>
                        <tr>

                            <th>
                                <select class="form-select" name="product" id="product_id">
                                    <option value="">Select product</option>
                                    @forelse ($products as $product)
                                        <option value="{{ $product }}">{{ $product->name }}</option>
                                    @empty
                                        <option value="">Data Not Found</option>
                                    @endforelse
                                </select>
                            </th>
                            <th class="text-end product_price">00</th>
                            <th class="text-end "><input class="product_qty form-control" type="text" value="1">
                            </th>
                            <th class="text-end "><input class="product_discount form-control" type="text"
                                    value="0"></th>
                            <th class="text-end "><input class="product_subtotal form-control" type="text"
                                    value="0"></th>
                            <th class="text-end "><button onclick="handle_add()" class="btn btn-primary">add</button></th>
                        </tr>
                    </thead>
                    <tbody id="cart_items">
                    </tbody>
                </table>
            </div>

            <!-- Totals -->
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Subtotal</th>
                            <td class="text-end grand_subtotal">1800</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td class="text-end grand_discount">90</td>
                        </tr>
                        <tr>
                            <th class="">Grand Total</th>
                            <th class="text-end grand_total">1890</th>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4">
                <p class="text-muted mb-1">Thank you for your business!</p>
                <strong>This is a computer-generated invoice.</strong>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script>
        let cart = [];
        // customer Change
        document.querySelector("#customer_id").addEventListener("change", function() {
            let customer_id = this.value;
            fetch(`{{ URL('customer/find') }}/ ${customer_id}`, )
                .then(res => {
                    console.log(res);
                    return res.json();
                })
                .then(data => {
                    console.log(data);
                    document.querySelector(".customer_email").innerText = data.email
                    document.querySelector(".customer_address").innerText = data.name
                })
                .catch(error => {
                    console.log(error);
                })

        })

        // product change

        document.querySelector("#product_id").addEventListener("change", function() {
            let product = JSON.parse(this.value);
            document.querySelector(".product_qty").value = 2;
            document.querySelector(".product_price").innerText = product.offer_price;
            document.querySelector(".product_subtotal").value = product.offer_price;
            // console.log(product);
        })

        function handle_add() {
            let product = JSON.parse(document.querySelector("#product_id").value)
            let qty = parseFloat(document.querySelector(".product_qty").value);
            let discount = parseFloat(document.querySelector(".product_discount").value);
            let subtotal = (qty * product.offer_price) - (qty * discount);

            let p = {
                id: product.id,
                name: product.name,
                price: product.offer_price,
                qty,
                discount,
                subtotal
            }

            let exists = cart.find(item => item.id == p.id);
            if (exists) {
                exists.qty += p.qty;
                exists.subtotal = (exists.qty * exists.price) - (exists.qty * exists.discount);
            } else {
                cart.push(p);
            }


            let total_reduce = cart.reduce((acc, item) => parseFloat(item.subtotal) + acc, 0);


            // console.log(cart);

            let total = 0;
            let total_discount = 0;
            let total_subtotal=0;


            cart.forEach(item => {
                total += item.subtotal;
                total_discount += item.discount;
                total_subtotal += item.price * item.qty;
            });


            console.log("total_reduce", total_reduce);
            console.log("total", total);
            console.log("total_discount", total_discount);

            document.querySelector(".grand_total").innerText=total
            document.querySelector(".grand_discount").innerText=total_discount
            document.querySelector("grand_subtotal").innerText=

            print()
        }


        function print() {
            let html = "";
            cart.forEach(element => {
                html += `

            <tr>
                    <td>${element.name}</td>
                    <td>${element.price}</td>
                    <td>${element.qty}</td>
                    <td>${element.discount}</td>
                    <td>${element.subtotal}</td>
                    <td> <button onclick="handle_delete(${element.id})" class="btn btn-danger">Del</button> </td>

                </tr>

       `;
            });

            document.querySelector("#cart_items").innerHTML = html
            // console.log(html);

        }

        function handle_delete(id) {
            cart = cart.filter(item => item.id != id);
            print()
        }
    </script>
@endpush
