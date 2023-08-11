<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Student;
use App\Models\student_accesstype;
use App\Models\accesstype;

use Symfony\Component\HttpKernel\Event\ViewEvent;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'accesstype' => 'required', // Make sure 'accesstype' field is correctly named in your form
            'email' => 'required',
            'password' => 'required'
        ]);
        $adddata = Student::create([
            'id' => $request->id,
            'name' => $request->name,
            'city' => $request->city,
            'accesstype' => $request->accesstype,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user_access_type = new student_accesstype();
        $user_access_type->student_id = $adddata->id;
        $user_access_type->accesstype_id = $request->input('access_type');
        $user_access_type->save();

        return view('login')
        ->with('success', 'Registered Successfully');
    }

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

    // public function login(Request $request)
    // {
    //     $email = $request->input('email');
    //     $password = $request->input('password');
    //     $student1 = $request->all();
    //     // Use Eloquent to fetch the user based on the provided credentials
    //     $student = Student::where('email', $email)
    //                 ->where('password', $password)
    //                 ->first();


    //     if ($student) {
    //         // If the user is found, store user data in the session
    //         session(['id' => $student->id]);
    //         session(['name' => $student->name]);
    //         session(['city' => $student->city]);
    //         session(['accesstype' => $student->accesstype]);
    //         session(['email' => $student->email]);
    //         session(['password' => $student->password]);
    //         // Session::put('student1',$student1);
    //         $userAccessType = student_accesstype::where('student_id', $student->id)->first();

    //         $accesstype = accesstype::where('accesstype_id', $userAccessType->accesstype_id)->value('accesstype');
      

    //         session(['accesstype' => $accesstype]);
    // // dd(session('accesstype'));
    //         return redirect()->route('students.dashboard');
    //     } else {
    //         // Handle login failure
    //         return redirect()->route('students.login');
    //     }
    // }


    public function login(Request $request)
    {
        // $email = $request->input('email');
        // $password = $request->input('password');
    
        // // Use Eloquent to fetch the user based on the provided credentials
        // $student = Student::where('email', $email)
        //             ->where('password', $password)
        //             ->first();
    
        // if ($student) {
        //     // If the user is found, store user data in the session
        //     session(['id' => $student->id]);
        //     session(['name' => $student->name]);
        //     session(['city' => $student->city]);
        //     session(['email' => $student->email]);
        //     session(['password' => $student->password]);
    
        //     // Check if student has an associated accesstype
        //     $userAccessType = student_accesstype::where('student_id', $student->id)->first();
            $val = Student::where('email', $request->email)
            ->first();
            if ($val) {
                // $accesstype = accesstype::where('id', $val->accesstype_id)->value('accesstype');
                // session(['accesstype' => $accesstype]);
                $data = $request->validate([
                    'email' => 'required',
                    'password' => 'required'
                ]);
            } else {
                // Handle case where accesstype is not found
                session(['accesstype' => null]);
            }

            if(Auth::attempt($data))
        {
            session(['id' => $val->id]);
            session(['name' => $val->name]);
            session(['city' => $val->city]);
            session(['email' => $val->email]);
            session(['password' => $val->password]);


            $userAccessType = student_accesstype::where('id', session('id'))->first();


            $accessType = accesstype::where('id', $userAccessType->user_access_id)->value('access_type');
            session(['access_type' => $accessType]);
    
            return redirect()->route('students.dashboard');
        } else {
            // Handle login failure
            return redirect()->route('students.login');
        }
    
        }


    public function logout(Request $request)
    {
        // Clear all data stored in the session
        session()->forget(['id', 'name', 'city' , 'accesstype']);

        // Redirect the user to the login page
        return view('login')->with('logout_success', true);
    }

    public function delete(Request $request,$id)
    {
       $student = Student::findOrFail($id);
       $student->delete();
       return redirect()->route('students.view');
    }
    
}
