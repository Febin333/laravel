<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('views', compact('books'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'cover_image' => 'nullable|url', // Validate it as a URL
        ]);

        // Store the book data in the database
        $book = Book::create($validatedData);

        return response()->json(['message' => 'Book added successfully', 'book' => $book], 201);
    }
    public function show($id)
    {
        $book = Book::findOrFail($id); // Find the book by ID or return a 404 error
        return view('books.show', compact('book'));
    }
    public function update(Request $request, $id)
    {
        // Find the book by ID
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        // Validate incoming request
        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'cover_image' => 'sometimes|url',
        ]);

        // Update book details
        $book->update($validatedData);

        return response()->json(['message' => 'Book updated successfully', 'book' => $book], 200);
    }
    public function destroy($id)
    {
        // Find the book by ID
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        // Delete the book
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully'], 200);
    }
}
