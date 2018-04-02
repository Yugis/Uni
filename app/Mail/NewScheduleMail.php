<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewScheduleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $scheduleType;
    // public $type = $scheduleType == 'lectureSchedule' ? 'Lecture' : 'Exam';
    public $subject = 'New Schedule';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($scheduleType)
    {
        $this->scheduleType = $scheduleType;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.emails.NewScheduleTemplate');
    }
}
