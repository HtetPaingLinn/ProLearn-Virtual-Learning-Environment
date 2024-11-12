<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function updateStatus(Request $request, $id)
{
    $student = Student::findOrFail($id);
    $student->status = $request->status;
    $student->save();

    return response()->json(['message' => 'Status updated successfully!']);
}

public function updateMajor(Request $request, $id)
{
    $student = Student::findOrFail($id);
    $student->destinationation_major_id = $request->major_id;
    $student->status = $request->status;
    $student->save();

    return response()->json(['message' => 'Major updated successfully!']);
}

public function updateMajorAndStatus(Request $request, $id)
{
    $student = Student::findOrFail($id);
    $student->destinationation_major_id = $request->major_id;
    $student->status = $request->status;
    $student->save();

    return response()->json(['message' => 'Major and status updated successfully!']);
}

}
