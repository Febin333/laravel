@extends('layout.frame')
<style>
    body {
    font-family: Arial, sans-serif;
}

.books-container {
    display: flex;
    flex-wrap: wrap;
}

.book-card {
    border: 1px solid #ddd;
    padding: 16px;
    margin: 10px;
    width: 250px;
    text-align: center;
}

.book-card img {
    max-width: 100%;
    height: auto;
}
h1 {
            font-size: 3rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            background: linear-gradient(90deg, #000000, #030202);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            margin-top: 20px;
            text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.1);
            letter-spacing: 1px;
            padding: 10px;
        }

        /* Optional: Adding animation to make it more lively */
        h1:hover {
            animation: colorChange 3s infinite alternate;
        }
        @keyframes colorChange {
            0% {
                color: #020202;
            }
            100% {
                color: #000000;
            }
        }
        .book {
    text-align: center;
    margin: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

.book a {
    text-decoration: none;
}

.book img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

.book h3, .book p {
    margin: 10px 0;
    color: #333;
}
    
</style>
<body>
    
    <h1 align="center">BookStore</h1>
    <div class="books-container" >
        @forelse($books as $book)
        <div class="book">
            <!-- Make only the image clickable -->
            <a href="{{ route('books.show', $book->id) }}">
                <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="book-image">
            </a>
            
            <!-- Book title and other details are outside the link -->
            <h3>{{ $book->title }}</h3>
            <p>{{ $book->author }}</p>
            <p>${{ $book->price }}</p>
        </div>
        
        @empty
            <p>No books available.</p>
        @endforelse
    </div>
</body>