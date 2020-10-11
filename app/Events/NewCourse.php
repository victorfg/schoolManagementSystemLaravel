<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewCourse
{
    use SerializesModels;

    public $course;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        $this->course = $course;
    }
}
