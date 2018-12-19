<?php

namespace App\Mail;

use App\User;
use App\Performance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PerformanceReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $receiver;
    public $performance;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Performance $performance, User $receiver)
    {
        $this->receiver = $receiver;
        $this->performance = $performance;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@segura.be')->subject("Optreden herinnering")->view('mails.performanceReminder');
    }
}
