<?php

namespace App\Http\Controllers;

use App\Events\ChapterStatus;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Events\ChapterStatusChange;
use App\Events\ChapterStatusChanged;

class ChapterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'chapter' => 'required',
        ]);

        $chapter = new Chapter();
        $chapter->chapter = $request->input('chapter');
        $chapter->save();

        return redirect()->route('chapter.show')->with('success', 'Chapter added successfully!');
    }
    public function show()
    {
        $chapter = Chapter::all();
        return view('chapters.view', compact('chapter'));
    }

    public function display($id)
    {
        $chapter = Chapter::find($id);
        return view('chapters.display', compact('chapter'));
    }

    public function edit($id)
    {
        $chapter = Chapter::find($id);
        return view('chapters.edit', compact('chapter'));
    }


    public function update(Request $request, $id)
    {
        // $request->validated();

        $chapter = Chapter::findOrFail($id);
        $chapter->update($request->all());
        $chapter->save();
        return redirect()->route('chapter.show')->with('success', 'Chapter updated successfully');
    }

    public function delete($id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->delete();
        return redirect()->route('chapter.show')->with('success', 'Chapter deleted successfully');
    }

    public function status(Request $request){
        $chapter = Chapter::findorfail($request->id);
        $chapterstatus = Chapter::where('active', $request->id)->first();
        if($chapter->active == true){
            $chapter->active = false;
            $chapter->save();
            event(new ChapterStatus($chapter)); // Dispatch the ChapterStatus event





            
        }

        else{
            $chapter->active = true;
            $chapter->save();
            event(new ChapterStatus($chapter)); // Dispatch the ChapterStatus event

       
        }
        return redirect()->route('chapter.show');
        // return view('chapters.view', compact('chapter', 'chapterstatus'));
        

    }





}