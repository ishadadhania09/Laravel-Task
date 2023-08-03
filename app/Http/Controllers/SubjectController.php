<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
        ]);

        $subject = new Subject();
        $subject->subject = $request->input('subject');
        $subject->save();

        return redirect()->route('subject.view')->with('success', 'subject added successfully!');
    }
    public function show()
    {
        $subject = Subject::all();
        return view('subjects.view', compact('subject'));
    }

    public function display($id)
    {
        $subject = Subject::find($id);
        return view('subjects.display', compact('subject'));
    }

    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subjects.edit', compact('subject'));
    }


    public function update(Request $request, $id)
    {
        // $request->validated();

        $subject = Subject::findOrFail($id);
        $subject->update($request->all());
        $subject->save();
        return redirect()->route('subject.view')->with('success', 'subject updated successfully');
    }

    public function delete($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('subject.view')->with('success', 'subject deleted successfully');
    }
}