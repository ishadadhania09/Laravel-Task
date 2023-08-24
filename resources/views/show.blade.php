
@extends('layout.app')

@section('title', 'Show Task')


@section('content')
    <h1>Student Information</h1>
    <p>Name: {{ $student['name'] }}</p>
    <p>City: {{ $student['city'] }}</p>
    <p>AccessType: {{ $student['accesstype'] }}</p>
    <p>Email: {{ $student['email'] }}</p>
<br>




<!-- <form action="{{ route('upload.image')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit">Upload Image</button>
</form> -->


    <a href="{{route('students.login')}}">Login</a>
    

@endsection
