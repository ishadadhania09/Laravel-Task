<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','image_path'];

    public function students(){
        return $this->belongesTo(Student::class);
    }
}


