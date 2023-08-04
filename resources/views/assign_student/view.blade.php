@extends('layout.app')

@section('title', 'Assign Students to Standards')

@section('content')
    <h1 style="text-align: center">Assign Students to Standards</h1><br>
    <form style="text-align: center" method="POST" action="{{ route('assign_student.store') }}">
        @csrf
        <label>Student:</label>
        <select name="student" required>
            @foreach ($students as $s)
                <option value="{{ $sub->id }}">{{ $sub->subject }}</option>
            @endforeach
        </select><br><br>

        <label>Chapters:</label>
        <select name="chapters[]" multiple required>
            @foreach ($chapters as $chap)
                <option value="{{ $chap->id }}">{{ $chap->chapter }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Assign Chapter</button>
    </form>
@endsection