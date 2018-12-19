<?php

namespace App\Mail;

use App\Mail;
use App\User;
use App\Performance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PerformanceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $receiver;
    public $performance;
    public $text;
    public $group;
    public $sender;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $sender, Performance $performance, User $receiver, $text, $group)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->text = $text;
        $this->performance = $performance;
        $this->group = $group;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch($this->group) {
            case 'alle':
            return $this->from($this->sender->email)->subject("Nieuw optreden")->view('mails.newPerformance');
            break;

            case 'wel':
            return $this->from($this->sender->email)->subject("Update voor een optreden")->view('mails.performanceUpdate');
            break;

            case 'niet':
            case 'onzeker':
            case 'onbekend':
            return $this->from($this->sender->email)->subject("Info over optreden")->view('mails.performanceMail');
            break;
        }
    }
}
