<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{

    public function view()
    {
        $student = Student::all();
        
        return view('view', compact('student'));

    }

    public function edit(Request $request,$id)
    {
        $student = Student::findOrFail($id);
        
        return view('edit', compact('student'));
    }
    public function update(Request $request, $id)
    {
        $user = Student::findOrFail($id);
        $user->update($request->all());
        $user->save();
        return redirect()->route('students.view');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $student1 = $request->all();
        // Use Eloquent to fetch the user based on the provided credentials
        $student = Student::where('email', $email)
                    ->where('password', $password)
                    ->first();


        if ($student) {
            // If the user is found, store user data in the session
            session(['id' => $student->id]);
            session(['name' => $student->name]);
            session(['city' => $student->city]);
            session(['accesstype' => $student->accesstype]);
            session(['email' => $student->email]);
            session(['password' => $student->password]);
            // Session::put('student1',$student1);

    
            return redirect()->route('students.dashboard');
        } else {
            // Handle login failure
            return redirect()->route('students.login');
        }
    }

    public function logout(Request $request)
    {
        // Clear all data stored in the session
        Session::forget('student');

        // Redirect the user to the login page
        return view('login');
    }

    public function delete(Request $request,$id)
    {
       $student = Student::findOrFail($id);
       $student->delete();
       return redirect()->route('students.view');
    }
    
}
