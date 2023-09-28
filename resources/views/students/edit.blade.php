@extends('layouts.app')

@section('content')
    <h2>Edit Student</h2>

    <form method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
@endsection
