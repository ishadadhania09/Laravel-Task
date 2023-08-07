<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accesstype extends Model
{
    use HasFactory;
    protected $table = 'student_accesstype';

    public function students()
    {
        return $this->hasMany(Student::class, 'accesstype');
    }
}
