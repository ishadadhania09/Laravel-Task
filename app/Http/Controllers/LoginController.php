<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
    
        // Use Eloquent to fetch the user based on the provided credentials
        $student = Student::where('email', $email)
                    ->where('password', $password)
                    ->first();
    
        if ($student) {
            // If the user is found, store user data in the session
            session(['id' => $student->id]);
            session(['name' => $student->first_name]);
            session(['city' => $student->last_name]);
            session(['email' => $student->email]);
            session(['password' => $student->state]);

    
            return redirect()->route('dashboard');
        } else {
            // Handle login failure
            return redirect()->back()->with('login_error', 'Invalid credentials. Please try again.');
        }
    }
}
