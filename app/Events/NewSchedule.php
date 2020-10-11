<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewSchedule
{
    use SerializesModels;

    public $schedule;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($schedule)
    {
        $this->schedule = $schedule;
    }
}
