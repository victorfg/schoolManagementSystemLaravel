<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    public function courses()
    {
        $this->belongsTo('courses');
    }
    public function subjects(){
        $this->belongsTo('subjects');
    }
}
