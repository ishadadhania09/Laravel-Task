<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function upload(Request $request)
{
    // dd($request);
    // Validate the form data
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
         // Adjust file types and size as needed
        
    ]);

    // $studentId = $request->input('student_id');
dd($request);
    // Process and store the uploaded image
    $imagePath = $request->file('image')->store('uploads', 'public'); // 'uploads' is the disk name

    // Save image information to the database
    $image =  Image::create([
        'image_path' => $imagePath,
        'student_id' => $studentId
        
    ]);

    return redirect()->route('students.view')
        ->with('success', 'Image uploaded successfully');
}

}
