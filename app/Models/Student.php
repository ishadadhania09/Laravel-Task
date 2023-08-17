<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'city','accesstype','email','password','image']; 

    // public function standards()
    // {
    //     return $this->belongsToMany(Student::class, 'assign_student');
    // }

    public function accesstype()
    {
        return $this->belongsToMany(accesstype::class, 'student_accesstype');
    }
}
