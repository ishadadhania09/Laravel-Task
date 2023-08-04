<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssignChapterController extends Controller
{
    public function view()
    {
        $subjects = Subject::all();
        $chapters = Chapter::all();

        return view('assign_chapter.view', compact('subjects', 'chapters'));
    }

    public function assign(Request $request)
    {
        $subjectId = $request->input('subject');
        $chapterId = $request->input('chapters',[]);

        $subject = Subject::find($subjectId);
        $subject->chapters()->sync($chapterId);

        return redirect()->route('students.dashboard')->with('success', 'Chapter assigned successfully.');
    }
}
