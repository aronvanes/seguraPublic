<?php

namespace App\Http\Controllers;

use App\Performance;
use App\UserPerformance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use Auth;
use DataTables;
use Session;

class UsersPerformanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('member');
    }

    public function update(Performance $performance, Request $request)
    {
        foreach($request->statusses as $userPerformance_id => $status) {
            $userPerformance = UserPerformance::findOrFail($userPerformance_id);
            $userPerformance->status = $status;
            $userPerformance->save();
        }
        return back();
    }

    public function updateStatus(Performance $performance, Request $request)
    {
        $user = Auth::user();
        if($request->has('user') && $request->has('status')) {
            try {
                $decrypted = Crypt::decryptString($request->user);

                if($user->id == $decrypted) {

                    if($request->status == 'wel' || $request->status == 'niet' || $request->status == 'onzeker') {
                        if(Carbon::now() <= $performance->deadline) {
                            $userPerformance = UserPerformance::where('performance_id', $performance->id)->where('user_id', $user->id)->first();
                            if (!is_null($userPerformance)) {
                                $userPerformance->status = $request->status;
                                $userPerformance->save();
                                Session::flash('success', 'Status aangepast');
                                return redirect()->route('performances.show', $performance);

                            } else {
                                Session::flash('error', 'Optreden bestaat niet');
                                return redirect('/');
                            }

                        } else {
                            Session::flash('error', 'Deadline voorbij');
                            return redirect()->route('performances.show', $performance);
                        }

                    } else {
                        Session::flash('error', 'Status ongeldig');
                        return redirect()->route('performances.show', $performance);
                    }

                } else {
                    Session::flash('error', 'Toegang geweigerd');
                    return redirect('/');
                }


            } catch (DecryptException $e) {
                Session::flash('error', $e->getMessage());
                return redirect()->route('performances.show', $performance);
            }


        } else {
            Session::flash('error', 'Link ongeldig');
            return redirect()->route('performances.show', $performance);
        }
    }
}
