<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\AssignChapterController;
use App\Http\Controllers\AssignSubjectController;
use App\Models\Chapter;
use App\Models\Standard;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('create');
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

Route::post('/students', function (Request $request) {
    // dd($request->all());
    $data = $request->validate([
        'name' => 'required',
        'city' => 'required',
        'accesstype' => 'required',
        'email' => 'required',
        'password' => 'required'
    ]);

    $student = new Student();
    $student->name = $data['name'];
    $student->city = $data['city'];
    $student->accesstype = $data['accesstype'];
    $student->email = $data['email'];
    $student->password = $data['password'];
    $student->save();
    echo("Latttest detail");
    echo("Name".$data['name']);
    echo("City ".$data['city']);
    echo("AccessType ".$data['accesstype']);
    echo("Email ".$data['email']);
    echo("Password ".$data['password']);

    return redirect()->route('students.show', ['id' => $student->id])
        ->with('success', 'User successfully created!');
})->name('students.store');

Route::get('/login', function () {
    return view('login');
})->name('students.login');


Route::put('/students/{id}', function ($id, Request $request) {
    $data = $request->validate([
        'name' => 'required',
        'city' => 'required',
        'accesstype' => 'required',
        'email' => 'required',
        'password' => 'required'
    ]);

    $student = new Student();
    $student->name = $data['name'];
    $student->city = $data['city'];
    $student->accesstype = $data['accesstype'];
    $student->email = $data['email'];
    $student->password = $data['password'];
    $student->save();

    return redirect()->route('students.edit', ['id' => $student->id])
        ->with('success', 'User updated successfully!');
})->name('students.edit');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('students.dashboard');




Route::get('/login', [LoginController::class, 'login'])->name('students.login');

Route::get('/delete/{id}', [LoginController::class, 'delete'])->name('students.delete');


Route::get('/view', [LoginController::class, 'view'])->name('students.view');

Route::get('/edit/{id}', [LoginController::class, 'edit'])->name('students.edit');
Route::put('/update/{id}', [LoginController::class, 'update'])->name('students.update');


Route::get('/logout', [LoginController::class, 'logout'])->name('students.logout');

//chapter

Route::get('/chapter/store', [ChapterController::class, 'store'])->name('chapter.store');

Route::post('/chapter/store', [ChapterController::class, 'store'])->name('chapter.store');

Route::get('/chapter/show', [ChapterController::class, 'show'])->name('chapter.show');

Route::put('/chapter/edit/{id}', [ChapterController::class, 'update'])->name('chapter.update');

Route::get('/chapter/edit/{id}', [ChapterController::class, 'edit'])->name('chapter.edit');

Route::get('/chapter/display/{id}', [ChapterController::class, 'display'])->name('chapter.display');


Route::delete('/chapter/delete/{id}', [ChapterController::class, 'delete'])->name('chapter.delete');

//standard

Route::post('/standard/store', [StandardController::class, 'store'])->name('standard.store');

Route::get('/standard/view', [StandardController::class, 'show'])->name('standard.view');

Route::put('/standard/edit/{id}', [StandardController::class, 'update'])->name('standard.update');

Route::get('/standard/edit/{id}', [StandardController::class, 'edit'])->name('standard.edit');

Route::get('/standard/display/{id}', [StandardController::class, 'display'])->name('standard.display');

Route::delete('/standard/delete/{id}', [StandardController::class, 'delete'])->name('standard.delete');



//subject

Route::post('/subject/store', [SubjectController::class, 'store'])->name('subject.store');

Route::get('/subject/show', [SubjectController::class, 'show'])->name('subject.view');

Route::put('/subject/edit/{id}', [SubjectController::class, 'update'])->name('subject.update');

Route::get('/subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');

Route::get('/subject/display/{id}', [SubjectController::class, 'display'])->name('subject.display');

Route::delete('/subject/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete');

//assign chapter to subject
Route::get('/assign_chapter', [AssignChapterController::class, 'view'])->name('assign_chapter.view');

Route::post('/assign_chapter', [AssignChapterController::class, 'assign'])->name('assign_chapter.store');

//assign subject to standard
Route::get('/assign_subject', [AssignSubjectController::class, 'view'])->name('assign_subject.view');

Route::post('/assign_subject', [AssignSubjectController::class, 'assign'])->name('assign_subject.store');