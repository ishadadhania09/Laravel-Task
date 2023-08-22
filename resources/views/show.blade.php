
@extends('layout.app')

@section('title', 'Show Task')


@section('content')
    <h1>Student Information</h1>
    <p>Name: {{ $student['name'] }}</p>
    <p>City: {{ $student['city'] }}</p>
    <p>AccessType: {{ $student['accesstype'] }}</p>
    <p>Email: {{ $student['email'] }}</p>

    <form method="POST" action="{{ route('students.store')}}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Upload</button>
    </form><br>
    <a href="{{route('students.login')}}">Login</a>
    

@endsection
