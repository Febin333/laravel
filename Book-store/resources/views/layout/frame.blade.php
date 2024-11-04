<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Positioning the link in the top-right corner */
.top-right {
    position: absolute;
    top: 20px; /* Adjust as needed */
    right: 20px; /* Adjust as needed */
}

 .cart-link {
    font-size: 16px; /* Adjust the font size */
    color: #333;
    text-decoration: none;
    padding: 10px 15px;
    border: 1px solid #333;
    border-radius: 5px;
    
} 

.cart-link:hover {
    background-color: #f0f0f0;
    color: #000;
}

    </style>
</head>
<body>
    <!-- Top Right Corner Link for View Cart -->
<div class="top-right">
    <i class=""></i><a  href="{{ route('cart.index') }}" class="cart-link">View Cart</a>
</div>

    <div class="container">
        <!-- This is where page content will be inserted -->
        @yield('content')
    </div>
</body>
</html>