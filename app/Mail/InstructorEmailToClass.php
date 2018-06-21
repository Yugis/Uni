<?php

namespace App\Mail;

use App\Student;
use App\Instructor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InstructorEmailToClass extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $body;
    public $instructor;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Student $student, $body, $subject, Instructor $instructor)
    {
        $this->student = $student;
        $this->body = $body;
        $this->subject = $subject;
        $this->instructor = $instructor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('instructors.emails.MailTemplate');
    }
}
