<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use App\Models\Student;
use App\Models\Userdata;
use Illuminate\Http\Request;

class AssignStudentController extends Controller
{
    public function view(){
        $standards = Standard::all();

        $check = "student";
        $result = Student::select('student_accesstype.student_id', 'students.name')
        ->join('student_accesstype', 'students.id', '=', 'student_accesstype.student_id')
        ->join('accesstype', 'student_accesstype.accesstype_id', '=', 'accesstype.id')
        ->where('accesstype.accesstype', $check)
        ->get();

        $students = $result;

        return view('assign_student.view', compact('standards', 'students'));
    }

    public function assign(Request $request)
    {
        $standardID = $request->input('standard');
        $studentId = $request->input('student',[]);

        // dd($standardID,$studentId);

        $standard = Standard::find($standardID);
        $standard->students()->sync($studentId);
        return redirect()->route('assign_student.show')->with('success', 'Subject assigned successfully.');
    }
}