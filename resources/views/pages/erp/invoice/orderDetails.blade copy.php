<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
                    <p class="mb-0">Name: <strong>{{ $order->customer?->name }}</strong></p>
                    <p class="mb-0">Phone: {{ $order->customer?->mobile }}</p>
                    <p>Email: {{ $order->customer?->email }}</p>
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
                            <th>#</th>
                            <th>Item</th>
                            <th class="text-end">Price</th>
                            <th class="text-end">Qty</th>
                            <th class="text-end">Discount</th>
                            <th class="text-end">subtotal</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($order->order_details as $key=> $details)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $details->product->name }}</td>
                                <td>{{ $details->price }}</td>
                                <td>{{ $details->qty }}</td>
                                <td>{{ $details->discount }}</td>
                                <td>{{ ($details->qty * $details->price) - $details->discount    }}</td>

                            </tr>
                        @endforeach



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
                            <td class="text-end">1800</td>
                        </tr>
                        <tr>
                            <th>Tax (5%)</th>
                            <td class="text-end">90</td>
                        </tr>
                        <tr>
                            <th class="fs-5">Grand Total</th>
                            <th class="text-end fs-5">1890</th>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4">
                <p class="text-muted mb-1">Thank you for your business!</p>
                <small>This is a computer-generated invoice.</small>
            </div>

        </div>
    </div>

    </body>

</html>
