<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use App\Models\Student;
use App\Models\Marks;

class StudentController extends Controller
{
    
public function index()
{
    $students = Student::all();
    return view('students.index', compact('students'));
}

public function create()
{
    return view('students.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students|max:255',
    ]);

    Student::create($validatedData);

    return redirect()->route('students.index')->with('success', 'Student added successfully');
}

public function edit($id)
{
    $student = Student::findOrFail($id);
    return view('students.edit', compact('student'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:students,email,' . $id,
    ]);

    $student = Student::findOrFail($id);
    $student->update($validatedData);

    return redirect()->route('students.index')->with('success', 'Student updated successfully');
}

public function destroy($id)
{
    // Soft delete
    $student = Student::findOrFail($id);
    $student->delete();

    // Hard delete (permanent removal)
    // Student::findOrFail($id)->forceDelete();

    return redirect()->route('students.index')->with('success', 'Student deleted successfully');
}

public function hardDelete($id)
{
    $student = Student::withTrashed()->findOrFail($id);
    $student->forceDelete(); // Hard delete

    return redirect()->route('students.index')->with('success', 'Student hard deleted successfully');
}

public function showAddMarksForm($id)
{
    $student = Student::findOrFail($id);


    return view('students.add-marks', compact('student'));
}


public function storeMarks(Request $request, $id)
{
    $validatedData = $request->validate([
        'subject' => 'required|string|max:255',
        'marks' => 'required|numeric',
    ]);

    // $student = Student::findOrFail($id);
    $mark = new Marks([
        'student_id' => $id,
        'subject' => $request->subject,
        'marks' => $request->marks
    ]);

    $mark->save();

    return redirect()->route('students.index')->with('success', 'Marks added successfully');
}

}
