<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Jobs\SendEmail;
use App\Mail\WelcomeEmail;
use App\Models\Student;
use App\Models\student_accesstype;
use App\Models\accesstype;
// use App\Http\Controllers\Mail;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class LoginController extends Controller
{
    public function create(Request $request){

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
        
        $useraccess = accesstype::where('id',$request->accesstype)->first();
        $user_access_type = new student_accesstype();
        $user_access_type->student_id = $adddata->id;
        $user_access_type->accesstype_id = $request->input('accesstype');
        $user_access_type->save();
// dd($adddata,$useraccess);
        // Mail::to($request->email)->send(new WelcomeEmail($adddata,$useraccess));
        SendEmail::dispatch($adddata,$useraccess);
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

    
    public function login(Request $request)
    {

            $val = Student::where('email', $request->email)
            ->first();
        

                $data = $request->validate([
                    'email' => 'required',
                    'password' => 'required'
                ]);
            if(Auth::attempt($data))
        {
            session(['id' => $val->id]);
            session(['name' => $val->name]);
            session(['city' => $val->city]);
            session(['email' => $val->email]);
            session(['password' => $val->password]);


            $userAccessType = student_accesstype::where('student_id', session('id'))->first();
// dd($userAccessType);

            $accessType = accesstype::where('id', $userAccessType->accesstype_id)->value('accesstype');
            session(['accesstype' => $accessType]);
    
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


    // public function index()
    // {
    //     return view('image');
    // }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    //     ]);

    //     $image_path = $request->file('image')->store('image', 'public');

    //     $data = Student::create([
    //         'image' => $image_path,
    //     ]);

    //     session()->flash('success', 'Image Upload successfully');

    //     return redirect()->route('image.index');
    // }

    // public function uploadImage(Request $request)
    // {
    //     $image = $request->file('image'); // Assuming 'image' is the input file field name

    //     $path = $image->store('images', 'public'); // 'images' is the directory inside 'storage/app/public'

    //     return 'Image uploaded successfully!';
    // }
    
}
