<!-- index.html -->
<!DOCTYPE html>
<html>
<head>
  <title>Education Portal</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      display: flex; /* Use flexbox to align items */
      align-items: center; /* Vertically align items in the center */
    }
     
    header .header-logo {
            display: inherit;
            height: 100px;
            width: 100px;
        }
        .header-logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        header h1 {
        text-align: center;
        margin: 0 auto;
    }


    nav {
      background-color: #f2f2f2;
      padding: 10px;
    }

    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      display: inline;
    }

    nav ul li a {
      color: #333;
      padding: 10px;
      text-decoration: none;
    }

    nav ul li a:hover {
      background-color: #333;
      color: #fff;
    }

    #content {
      padding: 20px;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
    
    .right-navbar {
      float: right;
      margin-top: 10px;
    }
    
    .right-navbar ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .right-navbar ul li {
      display: inline;
    }

    .right-navbar ul li a {
      color: #333;
      padding: 10px;
      text-decoration: none;
    }

    .right-navbar ul li a:hover {
      background-color: #333;
      color: #fff;
    }
  </style>
</head>
<body>
  <header>
  <a href="#" class="header-logo">
            <img src="{{ 'http://127.0.0.1:8000'.Storage::url(session('image_path')) }}" />
  </a>

    <h1>Welcome to the Education Portal</h1>
    
  </header>
  <div class="right-navbar">
    
    @if(session('accesstype') == "admin" || session('accesstype') == "teacher")
    <ul>
      <li><a href="{{route('students.create')}}">Add User</a></li>
      <li><a href="{{route('students.view')}}">List User</a></li>
      @endif
      <li><a href="{{route('students.logout')}}">Logout</a></li>
    </ul>
  </div>
<nav>
  <ul>
    <li><a href="{{route('subject.view')}}">View Subject</a></li>
    <li><a href="{{route('chapter.show')}}">View Chapter</a></li>
    <li><a href="{{route('standard.view')}}">View Standard</a></li>
    @if(session('accesstype') == "admin" || session('accesstype') == "teacher")
    <li class="dropdown">
      <a href="">Assignment Operation</a>
      <div class="dropdown-content">
        <a href="{{route('assign_chapter.view')}}">Assign Chapters</a>
        <a href="{{route('assign_subject.view')}}">Assign Subjects</a>
        <a href="{{route('assign_student.view')}}">Assign Students</a>
      </div>
    </li>
    @endif
  </ul>
  
 
</nav>
{{-- <h3>Welcome, {{ session('student1')['name'] }}</h3> --}}
<h3>{{session('name')}}</h3>




</body>
</html>

