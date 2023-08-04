<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function view()
    {
        $standards = Standard::all();
        $subjects = Subject::all();

        return view('assign_subject.view', compact('standards', 'subjects'));
    }

    public function assign(Request $request)
    {
        $standardID = $request->input('standard');
        $subjectId = $request->input('subjects',[]);

        $standard = Standard::find($standardID);
        $standard->subjects()->sync($subjectId);

        return redirect()->route('students.dashboard')->with('success', 'Subject assigned successfully.');
    }
}