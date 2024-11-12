<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class)->orderBy('order');
    }

    public function entolledcourse()
    {
        return $this->hasMany(student_enrolled_courses::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function completions()
    {
        return $this->hasMany(CourseCompletion::class, 'course_id');
    }
}
