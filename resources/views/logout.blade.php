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
      padding: 50px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f2f2f2;
      margin-top: 145px;
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

    .form-group button {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
      background-color: #6c4caf;
    }

    .form-group button[type="submit"] {
      background-color: #6c4caf;
      width: 106%;
      padding: 10px;
      color: white;
      cursor: pointer;
    }

    .form-group button[type="submit"]:hover {
      background-color: #6c4caf;
    }

  </style>
@endsection

<form action="" method="POST">
  
    @csrf
    <div class="container">
        <h1>Logout</h1>
        
          <div class="form-group">
            <label for="logout">Logout</label>
            <button><a href=""></a>Logout</button>  
          </div>
      
        </form>
      </div>
</form>
@endsection

