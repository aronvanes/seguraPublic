<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\PerformanceMail;
use Illuminate\Support\Facades\Mail as Mailable;

class SendMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public  $sender;
    public  $receivers;
    public  $performance;
    public  $message;
    public  $group;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sender, $receivers, $performance, $message, $group)
    {
        $this->sender = $sender;
        $this->receivers = $receivers;
        $this->performance = $performance;
        $this->message = $message;
        $this->group = $group;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->receivers as $receiver) {
            Mailable::to($receiver)->send(new PerformanceMail($this->sender, $this->performance, $receiver, $this->message, $this->group));
        }
    }
}
