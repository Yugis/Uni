<?php

namespace App\Mail;

use App\Admin;
use App\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailNotificationToClass extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $body;
    public $admin;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Student $student, $body, $subject, Admin $admin)
    {
        $this->student = $student;
        $this->body = $body;
        $this->subject = $subject;
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.emails.MailTemplate');
    }
}
