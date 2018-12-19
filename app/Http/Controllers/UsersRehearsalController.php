<?php

namespace App\Http\Controllers;

use App\Rehearsal;
use App\UserRehearsal;
use Illuminate\Http\Request;

use Auth;
use DataTables;

class UsersRehearsalController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    public function update(Rehearsal $rehearsal, Request $request)
    {
        foreach($request->statusses as $userRehearsal_id => $status) {
            $userRehearsal = UserRehearsal::findOrFail($userRehearsal_id);
            $userRehearsal->status = $status;
            $userRehearsal->save();
        }
        return back();
    }

    public function updateStatus(Request $request)
    {
        $userRehearsal = UserRehearsal::where('rehearsal_id', $request->rehearsal)->where('user_id', Auth::user()->id)->first();
        $userRehearsal->status = $request->status;
        $userRehearsal->save();
    }
}
