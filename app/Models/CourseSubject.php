<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'subject_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'subject_id' => 'integer',
    ];


    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class);
    }

    public function subject()
    {
        return $this->belongsTo(\App\Models\Subject::class);
    }
}
