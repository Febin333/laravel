<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CartController extends Controller
{
    public function add($id, Request $request) {
        $book = Book::findOrFail($id);
        
        $cart = session()->get('cart', []);

        // Add book to cart or increase quantity if it exists
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'title' => $book->title,
                'quantity' => 1,
                'price' => $book->price,
                'cover_image' => $book->cover_image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('books.show', $id)->with('success', 'Book added to cart successfully!');
    }
    public function index() {
        $cart = session()->get('cart', []); // Get the cart from session, or empty array if not found
        return view('cart.index', compact('cart'));
    }
    public function clear() {
        session()->forget('cart'); // Remove the cart from the session
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
    }
    
}
