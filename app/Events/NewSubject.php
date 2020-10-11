<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewSubject
{
    use SerializesModels;

    public $subject;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($subject)
    {
        $this->subject = $subject;
    }
}
