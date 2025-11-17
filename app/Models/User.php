<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Classes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'profile',
        'email',
        'password',
        'role',
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function studentDetail() {
        return $this->hasOne(Classes_detail::class, 'student_id', 'id');
    }

    public function course() {
        return $this->hasOne(Course::class);
    } 

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'classes_details', 'student_id', 'class_id');
    }

    public function department() {
        return $this->hasMany(Department::class);
    }
}
