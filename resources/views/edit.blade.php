
@extends('layout.app')
@section('title','add task')
@section('content')
@section('styles')
  <style>
    body {
      font-family: Arial, sans-serif;
      
    }

    .container {
      max-width: 400px;
      margin: auto auto;
      margin-top: 100px;
      padding: 50px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f2f2f2;
    }

    .container h1 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .form-group input[type="submit"] {
      background-color: #6c4caf;
      width: 106%;
      padding: 10px;
      color: white;
      cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
      background-color: #6c4caf;
    }

  </style>
@endsection


<form action="{{route('students.update',$student->id)}}" method="POST" enctype="multipart/form-data">
  
    @csrf
    @method('PUT')
    <div class="container">
    <h1>Edit Student</h1>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name = "name" id="name" value="{{ $student->name }}">
    </div>
    <div class="form-group">
      <label for="city">City</label>
      <input type="text" name = "city" id="city" value="{{ $student->city }}">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name = "email" id="email" value="{{ $student->email }}">
  </div>
    <div class="form-group">
      <label for="name">Password</label>
      <input type="text" name = "password" id="password" value="{{ $student->password }}">
    </div>
    <div class="form-group">
    <label for="name">Profile Picture</label>
    <input type="file" name="image">
    
    </form>
    </div>
    <div class="form-group">
    <input type="submit" value="Edit">
    </div>     

    
 
    </div>
</form>
@endsection