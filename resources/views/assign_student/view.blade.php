@extends('layout.app')

@section('title', 'Assign Student to Standard')

@section('content')
    <h1 style="text-align: center">Assign Student to Standard</h1><br>
    <form style="text-align: center" method="POST" action="{{ route('assign_student.store')}}">
        @csrf
        <label>Standard:</label>
        <select name="standard" required>
            @foreach ($standards as $std)
                <option value="{{ $std->id }}">{{ $std->standard }}</option>
            @endforeach
        </select><br><br>

        <label>Student:</label>
        <select name="students" multiple required>
            @foreach ($students as $sub)
                <option value="{{ $sub->student_id }}">{{ $sub->name }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Assign Student</button>
    </form>
@endsection