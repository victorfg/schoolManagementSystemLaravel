<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function schedules()
    {
        return $this->hasMany('schedules');
    }
    public function courseSubjects()
    {
        return $this->hasMany('course_subjects');
    }
    public function enrollments()
    {
        return $this->hasMany('enrollments');
    }
}
