<?php

namespace App\Models;

use App\Models\User;
use App\Models\Classes;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'for_year',
        'department_id',
    ];

   public function user() {
    return $this->belongsTo(User::class, 'added_by', 'id');
   } 

   public function department() {
    return $this->belongsTo(Department::class, 'department_code', 'id');
   }
}
