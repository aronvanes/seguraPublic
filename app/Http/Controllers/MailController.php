<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Performance;
use App\User;
use App\UserPerformance;
use App\Jobs\SendMails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Session;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager')->only('store');
    }
    // sengrid bekijken !

    public function store(Performance $performance, Request $request)
    {
        $mail = new Mail();
        $mail->performance_id = $performance->id;
        $mail->date = Carbon::now();
        $mail->group = $request->group;
        $mail->message = $request->message;
        $mail->save();

        if($request->group == 'alle') {
            $users = UserPerformance::where('performance_id', $performance->id)
                ->select('user_id')
                ->get()
                ->pluck('user_id');
        } else {
            $users = UserPerformance::where('performance_id', $performance->id)
                ->where('status', $request->group)
                ->select('user_id')
                ->get()
                ->pluck('user_id');
        }

        $receivers = User::whereIn('id', $users)->get();
        $job = new SendMails(Auth::user(), $receivers, $performance, $request->message, $request->group);
        dispatch($job);
        Session::flash('success', 'Mails worden verstuurd');
        return back();

    }
}
