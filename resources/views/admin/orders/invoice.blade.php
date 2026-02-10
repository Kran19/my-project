<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - {{ $order->order_number }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 40px;
            background-color: #fff;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #f3f4f6;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #4f46e5;
        }
        .company-info {
            text-align: right;
            font-size: 14px;
            color: #6b7280;
        }
        .invoice-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        .meta-group h3 {
            font-size: 14px;
            text-transform: uppercase;
            color: #9ca3af;
            margin-bottom: 8px;
            letter-spacing: 0.05em;
        }
        .meta-group p {
            margin: 0;
            font-weight: 500;
        }
        .address-box {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }
        .address-group h3 {
            font-size: 14px;
            text-transform: uppercase;
            color: #9ca3af;
            margin-bottom: 12px;
            border-bottom: 1px solid #f3f4f6;
            padding-bottom: 8px;
        }
        .address-group p {
            margin: 4px 0;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th {
            background-color: #f9fafb;
            text-align: left;
            padding: 12px;
            font-size: 13px;
            text-transform: uppercase;
            color: #6b7280;
            border-bottom: 1px solid #e5e7eb;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 14px;
        }
        .item-description {
            font-weight: 500;
        }
        .item-variant {
            font-size: 12px;
            color: #6b7280;
            margin-top: 2px;
        }
        .totals {
            margin-left: auto;
            width: 300px;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 14px;
        }
        .total-row.grand-total {
            border-top: 2px solid #4f46e5;
            margin-top: 8px;
            padding-top: 12px;
            font-size: 18px;
            font-weight: bold;
            color: #111827;
        }
        .footer {
            margin-top: 60px;
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
            border-top: 1px solid #f3f4f6;
            padding-top: 20px;
        }
        @print {
            body {
                padding: 0;
            }
            .no-print {
                display: none;
            }
        }
        .print-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #4f46e5;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <a href="#" onclick="window.print(); return false;" class="print-btn no-print">
        <i class="fas fa-print"></i> Print Invoice
    </a>

    <div class="invoice-container">
        <div class="header">
            <div class="logo">MyApiqo</div>
            <div class="company-info">
                <p><strong>MyApiqo Store</strong></p>
                <p>Ahmedabad, Gujarat, India</p>
                <p>Email: support@myapiqo.com</p>
                <p>Web: www.myapiqo.com</p>
            </div>
        </div>

        <div class="invoice-meta">
            <div class="meta-group">
                <h3>Invoice Number</h3>
                <p>#{{ $order->order_number }}</p>
            </div>
            <div class="meta-group">
                <h3>Date</h3>
                <p>{{ $order->created_at->format('M d, Y') }}</p>
            </div>
            <div class="meta-group">
                <h3>Order Status</h3>
                <p>{{ ucfirst($order->status) }}</p>
            </div>
            <div class="meta-group">
                <h3>Payment Status</h3>
                <p>{{ ucfirst(str_replace('_', ' ', $order->payment_status)) }}</p>
            </div>
        </div>

        <div class="address-box">
            <div class="address-group">
                <h3>Billed To</h3>
                <p><strong>{{ $order->customer->name }}</strong></p>
                <p>{{ $order->customer->email }}</p>
                <p>{{ $order->customer->mobile }}</p>
                @php
                    $billingAddress = is_array($order->billing_address) ? $order->billing_address : (is_string($order->billing_address) ? json_decode($order->billing_address, true) : []);
                    if (empty($billingAddress)) {
                        $billingAddress = is_array($order->shipping_address) ? $order->shipping_address : (is_string($order->shipping_address) ? json_decode($order->shipping_address, true) : []);
                    }
                @endphp
                @if(!empty($billingAddress))
                    <p>{{ $billingAddress['address'] ?? '' }}</p>
                    <p>{{ $billingAddress['city'] ?? '' }}, {{ $billingAddress['state'] ?? '' }} - {{ $billingAddress['pincode'] ?? '' }}</p>
                @endif
            </div>
            <div class="address-group">
                <h3>Shipped To</h3>
                <p><strong>{{ $order->customer->name }}</strong></p>
                @php
                    $shippingAddress = is_array($order->shipping_address) ? $order->shipping_address : (is_string($order->shipping_address) ? json_decode($order->shipping_address, true) : []);
                @endphp
                @if(!empty($shippingAddress))
                    <p>{{ $shippingAddress['address'] ?? '' }}</p>
                    <p>{{ $shippingAddress['city'] ?? '' }}, {{ $shippingAddress['state'] ?? '' }} - {{ $shippingAddress['pincode'] ?? '' }}</p>
                @endif
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th style="text-align: center;">Qty</th>
                    <th style="text-align: right;">Price</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td class="item-description">
                            {{ $item->product->name ?? 'N/A' }}
                            @if($item->variant)
                                <div class="item-variant">{{ $item->variant->name }}</div>
                            @endif
                        </td>
                        <td style="text-align: center;">{{ $item->quantity }}</td>
                        <td style="text-align: right;">{{ number_format($item->unit_price, 2) }}</td>
                        <td style="text-align: right;">{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="totals">
            <div class="total-row">
                <span>Subtotal</span>
                <span>{{ number_format($order->subtotal, 2) }}</span>
            </div>
            @if($order->tax_total > 0)
                <div class="total-row">
                    <span>Tax</span>
                    <span>{{ number_format($order->tax_total, 2) }}</span>
                </div>
            @endif
            <div class="total-row">
                <span>Shipping</span>
                <span>{{ number_format($order->shipping_total, 2) }}</span>
            </div>
            @if($order->discount_total > 0)
                <div class="total-row">
                    <span>Discount</span>
                    <span>-{{ number_format($order->discount_total, 2) }}</span>
                </div>
            @endif
            <div class="total-row grand-total">
                <span>Grand Total</span>
                <span>{{ number_format($order->grand_total, 2) }}</span>
            </div>
        </div>

        <div class="footer">
            <p>Thank you for your business!</p>
            <p>This is a computer-generated document and needs no signature.</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            // Uncomment the next line if you want the print dialog to open automatically
            // window.print();
        };
    </script>
</body>
</html>
