<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name',
        'department_code',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }

    public function creator() {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function classes() {
    return $this->hasMany(Classes::class, 'department_id');
    }
}
