<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'city','email','password']; 

    public function standards()
    {
        return $this->belongsToMany(Subject::class, 'assign_student');
    }
}
