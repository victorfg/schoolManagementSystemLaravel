<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'user_id',
        'status',
        'active',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'course_id' => 'integer',
        'user_id' => 'integer',
        'active' => 'boolean',
    ];


    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
