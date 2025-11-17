<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'id',
        'name',
        'room_number',
        'building',
        'teacher_id',
        'department_id',
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'classes_details', 'class_id', 'student_id');
    }

    public function department() {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
