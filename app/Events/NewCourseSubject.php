<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewCourseSubject
{
    use SerializesModels;

    public $courseSubject;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($courseSubject)
    {
        $this->courseSubject = $courseSubject;
    }
}
