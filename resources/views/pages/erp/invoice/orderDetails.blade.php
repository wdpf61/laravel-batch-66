<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

    <style>
        @page {
            size: A4;
            margin: 15mm;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
            background-color: #f8f9fa;
            font-size: 12px;
        }

        table {
            border-collapse: collapse;
        }

        .wrapper {
            width: 100%;
            background-color: #f8f9fa;
            padding: 20px 0;
        }

        .invoice-box {
            width: 100%;
            max-width: 700px;
            background: #ffffff;
            margin: 0 auto;
            padding: 30px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">

            <!-- Invoice Box -->
            <table class="invoice-box" width="100%" cellpadding="0" cellspacing="0">

                <!-- Header -->
                <tr>
                    <td width="50%" valign="top">
                        <h2 style="margin:0;font-size:24px;">INVOICE</h2>
                        <p style="margin:5px 0;"><strong>Invoice #:</strong> INV-001</p>
                        <p style="margin:0;"><strong>Date:</strong> {{ now()->format('d M Y') }}</p>
                    </td>

                    <td width="50%" valign="top" class="text-right">
                        <h4 style="margin:0;">Your Company Name</h4>
                        <p style="margin:5px 0;">Dhaka, Bangladesh</p>
                        <p style="margin:0;">Email: info@company.com</p>
                        <p style="margin:0;">Phone: +880 1234 567890</p>
                    </td>
                </tr>

                <tr><td colspan="2" height="25"></td></tr>

                <!-- Billing -->
                <tr>
                    <td valign="top">
                        <h4 style="margin-bottom:5px;">Billed To:</h4>
                        <p style="margin:3px 0;">
                            <strong>{{ $order->customer?->name }}</strong>
                        </p>
                        <p style="margin:3px 0;">
                            {{ $order->customer?->mobile }}
                        </p>
                        <p style="margin:3px 0;">
                            {{ $order->customer?->email }}
                        </p>
                    </td>

                    <td valign="top" class="text-right">
                        <h4 style="margin-bottom:5px;">Payment Method</h4>
                        <p style="margin:3px 0;">Cash / Bank / Mobile Banking</p>
                    </td>
                </tr>

                <tr><td colspan="2" height="25"></td></tr>

                <!-- Items -->
                <tr>
                    <td colspan="2">

                        <table width="100%" cellpadding="8" cellspacing="0">
                            <thead>
                            <tr style="background:#f1f1f1;">
                                <th align="left" style="border:1px solid #ddd;">#</th>
                                <th align="left" style="border:1px solid #ddd;">Item</th>
                                <th align="right" style="border:1px solid #ddd;">Price</th>
                                <th align="right" style="border:1px solid #ddd;">Qty</th>
                                <th align="right" style="border:1px solid #ddd;">Discount</th>
                                <th align="right" style="border:1px solid #ddd;">Subtotal</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($order->order_details as $key => $details)
                                <tr>
                                    <td style="border:1px solid #ddd;">{{ $key + 1 }}</td>
                                    <td style="border:1px solid #ddd;">
                                        {{ $details->product->name }}
                                    </td>
                                    <td style="border:1px solid #ddd;" align="right">
                                        {{ number_format($details->price, 2) }}
                                    </td>
                                    <td style="border:1px solid #ddd;" align="right">
                                        {{ $details->qty }}
                                    </td>
                                    <td style="border:1px solid #ddd;" align="right">
                                        {{ number_format($details->discount, 2) }}
                                    </td>
                                    <td style="border:1px solid #ddd;" align="right">
                                        {{ number_format(($details->qty * $details->price) - $details->discount, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </td>
                </tr>

                <tr><td colspan="2" height="20"></td></tr>

                <!-- Totals -->
                <tr>
                    <td></td>
                    <td>

                        <table width="100%" cellpadding="6" cellspacing="0">
                            <tr>
                                <td>Subtotal</td>
                                <td class="text-right">
                                    {{ number_format($order->subtotal ?? 0, 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td class="text-right">
                                    {{ number_format($order->tax ?? 0, 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:14px;"><strong>Grand Total</strong></td>
                                <td style="font-size:14px;" class="text-right">
                                    <strong>{{ number_format($order->total ?? 0, 2) }}</strong>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td colspan="2" class="text-center" style="padding-top:25px;">
                        <p style="margin:0;color:#777;">
                            Thank you for your business!
                        </p>
                        <small style="color:#999;">
                            This is a computer-generated invoice.
                        </small>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
