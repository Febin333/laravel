<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ClassModel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'teacher' => 'required|string',
            'schedule' => 'required|string',
        ]);

        $class = ClassModel::create($request->all());
        return response()->json($class, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $class;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'sometimes|string',
            'teacher' => 'sometimes|string',
            'schedule' => 'sometimes|string',
        ]);

        $class->update($request->all());
        return response()->json($class, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class->delete();
        return response()->json(null, 204);
    }
    public function students(ClassModel $class)
    {
        return $class->students;
    }
}
