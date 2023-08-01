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
    .error-message {
      color: red;
      font-size: 0.8rem;
    }
  </style>
@endsection

<form action="{{route('students.dashboard')}}" method="POST">
  
    @csrf
    <div class="container">
    <h1>Login</h1>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" required><br><br>
        @error('email')
        <p class="error-message">{{ 'Please fill the details.' }}</p>
      @enderror
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        @error('email')
        <p class="error-message">{{ 'Please fill the details.' }}</p>
      @enderror
    </div>
    <div class="form-group">
    <input type="submit" name="login" value="Login">
    </div>     

      <label>Don't have an account?<a href="registrationform.php">Sign Up</a></label>
 
    </div>
</form>
@endsection

