<!-- resources/views/books/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }} - Details</title>
    <style>
        /* Center content */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        /* Card container styling */
        .details-card {
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 20px;
        }

        /* Book cover styling */
        /* .details-card img {
            width: 90%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        } */

        /* Text styling */
        .details-card h1 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 10px;
        }

        .details-card p {
            font-size: 1rem;
            color: #555;
            margin: 5px 0;
        }

        /* Price styling */
        .price {
            font-size: 1.2rem;
            color: #28a745;
            font-weight: bold;
            margin-top: 15px;
        }

        /* Add to Cart Button */
        .add-to-cart {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #ffffff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .add-to-cart:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="details-card">
        @if($book->cover_image)
            <img src="{{ $book->cover_image }}" alt="{{ $book->title }} cover">
        @endif

        <h1>{{ $book->title }}</h1>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Description:</strong> {{ $book->description }}</p>
        <p class="price">Price: ${{ number_format($book->price, 2) }}</p>

        <!-- Add to Cart Button -->
        <form action="{{ route('cart.add', $book->id) }}" method="POST">
            @csrf
            <button type="submit" class="add-to-cart">Add to Cart</button>
        </form>
    </div>
</body>
</html>
