<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;

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
// dd($students);
        return view('assign_student.view', compact('standards', 'students'));
    }

    public function assign(Request $request)
    {
        $standardID = $request->input('standard');
        $studentId = $request->input('students');

        // dd($standardID,$studentId);
        

        
            $standard = Standard::find($standardID);
            $standard->students()->sync($studentId);
            // return redirect()->route('assign_student.dashboard')->with('success', 'Student assigned successfully.');
            return redirect()->route('students.dashboard')->with('success', 'Student assigned successfully.');
        
}


// public function assign(Request $request)
// {
//     $standardID = $request->input('standard');
//     $studentIds = $request->input('students', []);

//     try {
//         $standard = Standard::find($standardID);
        
//         if ($standard) {
//             $standard->students()->sync($studentIds);
//             return redirect()->route('students.dashboard')->with('success', 'Chapter assigned successfully.');
//         } else {
//             return redirect()->route('assign_student.view')->with('error', 'Standard not found.');
//         }
//     } catch (QueryException $e) {
//         return redirect()->route('assign_student.view')->with('error', 'Error assigning students.');
//     }
// }

}