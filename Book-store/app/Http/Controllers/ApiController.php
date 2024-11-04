<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class ApiController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json(['books' => $books], 200);
    }

    // Get a specific book by ID
    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json(['book' => $book], 200);
    }
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'cover_image' => 'sometimes|url',
        ]);

        $book->update($validatedData);

        return response()->json(['message' => 'Book updated successfully', 'book' => $book], 200);
    }
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully'], 200);
    }
}
