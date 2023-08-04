<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['subject'];

    public function chapters()
    {
        return $this->belongsToMany(Chapter::class, 'assign_chapter');
    }

    public function standards()
    {
        return $this->belongsToMany(Chapter::class, 'assign_subject');
    }
}
