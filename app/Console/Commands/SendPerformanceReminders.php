<?php

namespace App\Console\Commands;

use App\Performance;
use App\User;
use App\Mail\PerformanceReminderMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail as Mailable;

class SendPerformanceReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'performance:sendReminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail reminders to anyone who has not upated their status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $performances = Performance::almostDeadline()->get();
        foreach($performances as $performance) {
            $user_ids = $performance->performanceUsers()->unsure()->get();
            $receivers = User::whereIn('id', $user_ids)->get();
            foreach($receivers as $receiver) {
                Mailable::to($receiver->email)->send(new PerformanceReminderMail($performance, $receiver));
            }
        }
    }
}
