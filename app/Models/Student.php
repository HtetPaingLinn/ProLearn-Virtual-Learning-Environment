<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory,Notifiable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function chapters()
    {
        return $this->belongsToMany(Chapter::class);
    }

    public function enrolledCourses()
    {
        return $this->hasMany(student_enrolled_courses::class);
    }

    public function unfinishedCourses()
    {
        return $this->hasMany(Course::class, 'major_id', 'major_id')
                    ->whereDoesntHave('completions', function ($query) {
                        $query->where('user_id', $this->user_id);
                    });
    }
}
