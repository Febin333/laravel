<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Attendance::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:Present,Absent',
        ]);

        $attendance = Attendance::create($request->all());
        return response()->json($attendance, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $attendance;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_id' => 'sometimes|exists:students,id',
            'class_id' => 'sometimes|exists:classes,id',
            'attendance_date' => 'sometimes|date',
            'status' => 'sometimes|in:Present,Absent',
        ]);

        $attendance->update($request->all());
        return response()->json($attendance, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendance->delete();
        return response()->json(null, 204);
    }
}
