
@extends('layout.app')
@section('title','add task')
@section('content')
@section('styles')
  <style>
    .error-message {
      color: red;
      font-size: 0.8rem;
    }
  </style>
@endsection

{{-- <form action="{{url('register')}}" method="POST"> --}}
    <form action="{{route('students.store')}}" method="POST">
    <h1>Add Student</h1>
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name = "name" id="name">
        @error('name')
        <p class="error-message">{{ 'Please fill the details.' }}</p>
      @enderror
    </div><br>
    <div>
        <label for="city">City</label>
        <input type="text" name = "city" id="city">
        @error('city')
        <p class="error-message">{{ 'Please fill the details.' }}</p>
      @enderror
    </div><br>
    <div>
        <label for="email">Email</label>
        <input type="text" name = "email" id="email">
        @error('email')
        <p class="error-message">{{ 'Please fill the details.' }}</p>
      @enderror
    </div><br>
    <div>
        <label for="password">Password</label>
        <input type="password" name = "password" id="password">
        @error('password')
        <p class="error-message">{{ 'Please fill the details.' }}</p>
      @enderror
    </div><br>
    <div>
        <button type="submit">Add Student</button>
    </div>
    <label>Already have an account?<a href="{{route('students.login')}}">Login</a></label>
</form>
@endsection
