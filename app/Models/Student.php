<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'city','accesstype','email','password']; 

    // public function standards()
    // {
    //     return $this->belongsToMany(Student::class, 'assign_student');
    // }

    public function accesstype()
    {
        return $this->belongsToMany(accesstype::class, 'student_accesstype');
    }
}
