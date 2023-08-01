
@extends('layout.app')

@section('title', 'Show Task')


@section('content')
    <h1>Student Information</h1>
    <p>Name: {{ $student['name'] }}</p>
    <p>City: {{ $student['city'] }}</p>
    <p>Email: {{ $student['email'] }}</p>
    <p>Password: {{ $student['password'] }}</p>

@endsection
