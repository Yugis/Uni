<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewQuizCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Quiz Available!';
    public $course;
    public $quiz;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($course, $quiz)
    {
        $this->course = $course;
        $this->quiz = $quiz;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.NewQuizTemplate');
    }
}
