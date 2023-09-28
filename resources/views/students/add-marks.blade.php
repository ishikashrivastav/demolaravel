<!-- resources/views/students/add-marks.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Add Marks for {{ $student->name }}</h2>
    
    <form action="{{ route('students.store-marks', $student->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="marks">Marks:</label>
            <input type="number" name="marks" id="marks" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Marks</button>
    </form>
@endsection
