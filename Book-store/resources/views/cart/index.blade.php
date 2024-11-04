<!-- resources/views/cart/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        /* Center content */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        /* Main container for cart */
        .cart-container {
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
        }

        /* Image styling in table */
        .cart-image {
            width: 50px;
            height: auto;
            border-radius: 5px;
        }

        /* Total price styling */
        .total-row {
            font-weight: bold;
            color: #28a745;
            font-size: 1.1rem;
        }

        /* Empty cart message */
        .empty-cart {
            font-size: 1.2rem;
            color: #888;
            margin-top: 20px;
        }

        /* Clear Cart Button */
        .clear-cart {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #ffffff;
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .clear-cart:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <h1>Your Cart</h1>

        @if(count($cart) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Book</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalPrice = 0; @endphp
                    @foreach($cart as $item)
                        @php
                            $itemTotal = $item['price'] * $item['quantity'];
                            $totalPrice += $itemTotal;
                        @endphp
                        <tr>
                            <td>
                                <img src="{{ $item['cover_image'] }}" alt="{{ $item['title'] }}" class="cart-image">
                                {{ $item['title'] }}
                            </td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($itemTotal, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr class="total-row">
                        <td colspan="3">Total Price:</td>
                        <td>${{ number_format($totalPrice, 2) }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Clear Cart Button -->
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="clear-cart">Clear Cart</button>
            </form>
        @else
            <p class="empty-cart">Your cart is empty.</p>
        @endif
    </div>
</body>
</html>
