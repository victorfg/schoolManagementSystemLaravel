<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    public function courses()
    {
        $this->belongsTo('courses');
    }
    public function students(){
        $this->belongsTo('users');
    }
}
