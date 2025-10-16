@extends('layouts.app')

@section('title', 'Regsier Students')

@section('content')
<div class="container mt-5">
    <h2>Register Student</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="student_name" class="form-label">Name</label>
            <input type="text" name="student_name" class="form-control" value="{{ old('student_name') }}">
        </div>

        <div class="mb-3">
            <label for="student_address" class="form-label">Address</label>
            <input type="text" name="student_address" class="form-control" value="{{ old('student_address') }}">
        </div>

        <div class="mb-3">
            <label for="student_state" class="form-label">State (2 letters)</label>
            <input type="text" name="student_state" class="form-control" maxlength="2" value="{{ old('student_state') }}">
        </div>

        <div class="mb-3">
            <label for="student_zip" class="form-label">ZIP Code</label>
            <input type="text" name="student_zip" class="form-control" maxlength="5" value="{{ old('student_zip') }}">
        </div>

        <div class="mb-3">
            <label for="student_age" class="form-label">Age</label>
            <input type="number" name="student_age" class="form-control" value="{{ old('student_age') }}">
        </div>

        <button type="submit" class="btn btn-primary">Register Student</button>
    </form>
</div>
@endsection