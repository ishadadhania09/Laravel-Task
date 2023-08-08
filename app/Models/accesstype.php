<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accesstype extends Model
{
    use HasFactory;
    protected $table = 'accesstype';

    // public function students()
    // {
    //     return $this->hasMany(Student::class, 'accesstype');
    // }

    public function students()
    {
        return $this->hasMany(students::class, 'student_accesstype');
    }
}
