<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Display a listing of students
    public function index()
    {
        return response()->json(Student::all(), 200);
    }

    // Store a new student in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string|in:male,female,other',
            'class_id' => 'required|integer|exists:classes,id'  // Assuming a 'classes' table exists
        ]);

        $student = Student::create($validatedData);

        return response()->json($student, 201); // Return the created student data with 201 status
    }

    // Display a specific student by ID
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        return response()->json($student, 200);
    }

    // Update an existing student by ID
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'age' => 'sometimes|integer',
            'gender' => 'sometimes|string|in:male,female,other',
            'class_id' => 'sometimes|integer|exists:classes,id'
        ]);

        $student->update($validatedData);

        return response()->json($student, 200);
    }

    // Delete a student by ID
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}
