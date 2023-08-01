<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view()
    {
        // Fetch data from the database or any other data source as needed
        $student = Student::all(); // Fetch all tasks from the database (you might want to paginate this in a real application)

        // Pass the data to the view
        return view('view_tasks', ['students' => $student]);
    }
}

