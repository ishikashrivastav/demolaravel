<!-- resources/views/students/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Student List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-success">Add Student</a>

{{--Secondary Button {{ route('students.edit', $student->id) }}  {{ route('students.create') }} --}}

</button>
    <table border='1' style='border-collapse:collapse'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info" >soft Delete</button>
                           
                        </form>
                        <form action="{{ route('students.hard-delete', $student->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Hard Delete</button>
                        </form>
                        <a href="{{ route('students.add-marks', $student->id) }}" class="btn btn-success">Add Marks</a>
                        <a href="{{ route('generate.pdf', $student->id) }}" target="_blank" class="btn btn-primary">Generate PDF</a>
                        <a href="{{ route('export.students') }}" class="btn btn-success">Export Students</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
