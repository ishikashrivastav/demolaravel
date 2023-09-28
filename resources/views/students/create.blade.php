
@extends('layouts.app')

@section('content')
    <h2>Create Student</h2>

    <form method="POST" action="{{ route('students.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Student</button>
    </form>
@endsection
