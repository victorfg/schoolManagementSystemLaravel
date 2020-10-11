<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewCourseSubject
{
    use SerializesModels;

    public $course_subject;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($course_subject)
    {
        $this->course_subject = $course_subject;
    }
}
