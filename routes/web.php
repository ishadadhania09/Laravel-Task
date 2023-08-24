<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\AssignChapterController;
use App\Http\Controllers\AssignSubjectController;
use App\Http\Controllers\AssignStudentController;
use App\Http\Controllers\ImageController;
use App\Models\Chapter;
use App\Models\Standard;
use App\Models\Student;
use App\Models\student_accesstype;
use App\Models\accesstype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',function(){
    $accesstype = accesstype::all();
    return view('create',['accesstype' => $accesstype]);
})->name('students.create');

Route::get('/students', function () {
    return view('index', [
        'student' => Student::latest()->get()
      
    ]);
})->name('students.index');



Route::get('/students/{id}', function ($id){
    return view('show',[
        'student' => Student::findOrFail($id)
    ]);
})->name('students.show');

Route::post('/create',[LoginController::class, 'create'])->name('students.store');

Route::get('/login', function () {


    
    return view('login');
})->name('students.login');


// Route::put('/students/{id}', function ($id, Request $request) {
//     $data = $request->validate([
//         'name' => 'required',
//         'city' => 'required',
//         'accesstype' => 'required',
//         'email' => 'required',
//         'password' => 'required',
        
//     ]);

//     $student = new Student();
//     $student->name = $data['name'];
//     $student->city = $data['city'];
//     $student->accesstype = $data['accesstype'];
//     $student->email = $data['email'];
//     $student->password = $data['password'];
//     $student->save();

//     $userdatas = Student::findOrFail($id);
//     if ($request->hasFile('image')){

        
//         $path = Storage::disk('public')->putFile('uploads', $request->file('image'));

//         if ($userdatas->image) {
//             Storage::delete($userdatas->image->image_path);
//             $userdatas->image->image_path = $path;
//             $userdatas->image->save();
//         } else {
//             $userdatas->image()->save(
//                 Image::create([
//                     'image_path' => $path,
//                     'student_id' => $request->id
//                     ])
//             );
//         }
//         $img = Image::where('student_id',$request->id)->first();
//         session(['image_path' => $img->image_path]);
//     }

//     $userdatas->update($request->all());
//     $userdatas->save();
    


//     return redirect()->route('students.edit', ['id' => $student->id])
//         ->with('success', 'User updated successfully!');
// })->name('students.edit');


Route::get('/dashboard', function () {
    return view('dashboard');




})->name('students.dashboard')->middleware('auth');




Route::post('/login', [LoginController::class, 'login'])->name('students.login');

Route::get('/delete/{id}', [LoginController::class, 'delete'])->name('students.delete');


Route::get('/view', [LoginController::class, 'view'])->name('students.view');

Route::get('/edit/{id}', [LoginController::class, 'edit'])->name('students.edit');
Route::put('/update/{id}', [LoginController::class, 'update'])->name('students.update');


Route::get('/logout', [LoginController::class, 'logout'])->name('students.logout');

//chapter

Route::get('/chapter/store', [ChapterController::class, 'store'])->name('chapter.store')->middleware('auth');

Route::post('/chapter/store', [ChapterController::class, 'store'])->name('chapter.store')->middleware('auth');

Route::get('/chapter/show', [ChapterController::class, 'show'])->name('chapter.show')->middleware('auth');

Route::put('/chapter/edit/{id}', [ChapterController::class, 'update'])->name('chapter.update')->middleware('auth');

Route::get('/chapter/edit/{id}', [ChapterController::class, 'edit'])->name('chapter.edit')->middleware('auth');

Route::get('/chapter/display/{id}', [ChapterController::class, 'display'])->name('chapter.display')->middleware('auth');


Route::delete('/chapter/delete/{id}', [ChapterController::class, 'delete'])->name('chapter.delete')->middleware('auth');
Route::get('/chapter/status/{id}', [ChapterController::class, 'status'])->name('chapter.status')->middleware('auth');
Route::post('/chapter/status/{id}', [ChapterController::class, 'status'])->name('chapter.status')->middleware('auth');
//standard

Route::post('/standard/store', [StandardController::class, 'store'])->name('standard.store')->middleware('auth');

Route::get('/standard/view', [StandardController::class, 'show'])->name('standard.view')->middleware('auth');

Route::put('/standard/edit/{id}', [StandardController::class, 'update'])->name('standard.update')->middleware('auth');

Route::get('/standard/edit/{id}', [StandardController::class, 'edit'])->name('standard.edit')->middleware('auth');

Route::get('/standard/display/{id}', [StandardController::class, 'display'])->name('standard.display')->middleware('auth');

Route::delete('/standard/delete/{id}', [StandardController::class, 'delete'])->name('standard.delete')->middleware('auth');



//subject

Route::post('/subject/store', [SubjectController::class, 'store'])->name('subject.store')->middleware('auth');

Route::get('/subject/show', [SubjectController::class, 'show'])->name('subject.view')->middleware('auth');

Route::put('/subject/edit/{id}', [SubjectController::class, 'update'])->name('subject.update')->middleware('auth');

Route::get('/subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit')->middleware('auth');

Route::get('/subject/display/{id}', [SubjectController::class, 'display'])->name('subject.display')->middleware('auth');

Route::delete('/subject/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete')->middleware('auth');

//assign chapter to subject
Route::get('/assign_chapter', [AssignChapterController::class, 'view'])->name('assign_chapter.view')->middleware('auth');

Route::post('/assign_chapter', [AssignChapterController::class, 'assign'])->name('assign_chapter.store')->middleware('auth');

//assign subject to standard
Route::get('/assign_subject', [AssignSubjectController::class, 'view'])->name('assign_subject.view')->middleware('auth');

Route::post('/assign_subject', [AssignSubjectController::class, 'assign'])->name('assign_subject.store')->middleware('auth');

//assign student to standard
Route::get('/assign_student', [AssignStudentController::class, 'view'])->name('assign_student.view')->middleware('auth');

Route::post('/assign_student', [AssignStudentController::class, 'assign'])->name('assign_student.store')->middleware('auth');


Route::post('/send-email', 'EmailController@sendEmail');

//image


// Route::get('/students', [ImageController::class, 'index'])->name('students.index');
// Route::get('/students/{id}', [ImageController::class, 'show'])->name('students.show');
// Route::get('/upload', [ImageController::class, 'create'])->name('students.create');
// Route::post('/upload', [ImageController::class, 'store'])->name('students.store');

// Route::get('/upload', [ImageController::class, 'upload'])->name('upload.image');
// Route::post('/upload', [ImageController::class, 'upload'])->name('upload.image');

