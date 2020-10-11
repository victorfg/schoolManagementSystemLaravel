<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewEnrollment
{
    use SerializesModels;

    public $enrollment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($enrollment)
    {
        $this->enrollment = $enrollment;
    }
}
