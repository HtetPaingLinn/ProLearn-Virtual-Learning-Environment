<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
