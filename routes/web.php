<?php

use App\Http\Controllers\LoginController;
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
        'email' => 'required',
        'password' => 'required'
    ]);

    $student = new Student();
    $student->name = $data['name'];
    $student->city = $data['city'];
    $student->email = $data['email'];
    $student->password = $data['password'];
    $student->save();
    echo("Latttest detail");
    echo("Name".$data['name']);
    echo("City ".$data['city']);
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
        'email' => 'required',
        'password' => 'required'
    ]);

    $student = new Student();
    $student->name = $data['name'];
    $student->city = $data['city'];
    $student->email = $data['email'];
    $student->password = $data['password'];
    $student->save();

    return redirect()->route('students.edit', ['id' => $student->id])
        ->with('success', 'User updated successfully!');
})->name('students.edit');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('students.dashboard');

Route::get('/logout', function () {
    return view('logout');
})->name('students.logout');

Route::get('/logout', function () {
    return view('logout');
})->name('students.logout');

Route::post('/login', [LoginController::class, 'login'])->name('students.login');

Route::get('/delete/{id}', [LoginController::class, 'delete'])->name('students.delete');


Route::get('/view', [LoginController::class, 'view'])->name('students.view');

Route::get('/edit/{id}', [LoginController::class, 'edit'])->name('students.edit');
Route::put('/update/{id}', [LoginController::class, 'update'])->name('students.update');


Route::get('/logout', [LoginController::class, 'logout'])->name('students.logout');