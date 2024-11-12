<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Skill;
use App\Models\Experience;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the user's role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the user's student record.
     */
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    /**
     * Get the user's teacher record.
     */
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    /**
     * Get the user's job recruiter record.
     */
    public function jobRecruiter()
    {
        return $this->hasOne(JobRecruiter::class);
    }

    /**
     * Get the skills associated with the user.
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * Get the experiences associated with the user.
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function canEnrollInCourse($courseMajorId, $userMajorId)
    {


        if ($userMajorId >= 1 && $userMajorId <= 7) {
            // Majors 1 to 7 can enroll in courses with major_id from 1 to their major_id
            return $courseMajorId >= 1 && $courseMajorId <= $userMajorId;
        } elseif ($userMajorId >= 8 && $userMajorId <= 14) {
            // Majors 8 to 14 can enroll in courses with major_id from 1 to 7 and their own major_id
            return ($courseMajorId >= 1 && $courseMajorId <= 7) || ($courseMajorId == $userMajorId);
        } elseif ($userMajorId >= 15 && $userMajorId <= 21) {
            // Majors 15 to 21 can enroll in courses with major_id from 1 to 7,
            // the related major in 8 to 14, and their own major_id
            $relatedMajorId8To14 = $userMajorId - 7;
            return ($courseMajorId >= 1 && $courseMajorId <= 7) ||
                ($courseMajorId == $relatedMajorId8To14) ||
                ($courseMajorId == $userMajorId);
        }

        // If none of the conditions are met, return false
        return $userMajorId;
    }
}
