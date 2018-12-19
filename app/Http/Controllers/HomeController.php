<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Performance;
use App\Rehearsal;
use App\UserPerformance;
use Carbon\Carbon;

use Auth;
use DataTables;
use Form;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getPerformances()
    {
        $performances = Performance::future();

        return DataTables::eloquent($performances)
        ->editColumn('occasion', function($performance) {
            return '<a href="'.Route('performances.show', $performance->id).'">'.$performance->occasion.'</a>';
        })
        ->editColumn('date', function($performance) {
            return $performance->getDate();
        })
        ->editColumn('status', function($performance) {
            $performanceUser = UserPerformance::where('performance_id', $performance->id)->where('user_id', Auth::user()->id)->first();
            if(!is_null($performanceUser)) {
                if($performanceUser->status == 'wel') {
                    return '<span class="status status-wel">&nbsp;</span>';

                } else if($performanceUser->status == 'onzeker') {
                    return '<span class="status status-onzeker">&nbsp;</span>';

                } else if ($performanceUser->status == 'niet') {
                    return '<span class="status status-niet">&nbsp;</span>';
                }
                return '<span class="status status-onbekend">&nbsp;</span>';

            } else {
                return '';
            }

        })
        ->rawColumns(['occasion', 'status'])
        ->orderColumn('occasion', 'occasion $1')
        ->orderColumn('date', 'date $1')
        ->orderColumn('status', 'status $1')
        ->make();
    }

    public function getRehearsals()
    {
        $rehearsals = Rehearsal::future();

        return DataTables::eloquent($rehearsals)
        ->editColumn('date', function($rehearsal) {
            if(Auth::user()->isAdmin()) {
                return'<a href="'.Route('rehearsals.show', $rehearsal->id).'">'.$rehearsal->getDate().'</a>';
            }
            return $rehearsal->getDate();
        })
        ->editColumn('particularities', function($rehearsal) {
            if(Auth::user()->isAdmin()) {
                return '<a href="'.Route('rehearsals.show', $rehearsal->id).'">'.$rehearsal->particularities.'</a>';
            }
            return $rehearsal->particularities;
        })
        ->addColumn('userStatus', function($rehearsal) {
            if(Auth::user()->isActive()) {
                $rehearsalUsers = $rehearsal->rehearsalUsers()->joinUsers()->where('users.id', Auth::user()->id)->select('users_rehearsals.status as userStatus')->first();
                if(!is_null($rehearsalUsers)) {
                    $userStatus = $rehearsalUsers->userStatus;

                    return
                        Form::radio('userStatus_'.$rehearsal->id, 'wel', $userStatus=='wel', ['class' => 'user_rehearsal_status', 'data-rehearsal' => $rehearsal->id]).' Wel '.
                        Form::radio('userStatus_'.$rehearsal->id, ' niet ', $userStatus=='niet', ['class' => 'user_rehearsal_status', 'data-rehearsal' => $rehearsal->id]).'Niet';
                }

            }
            return '';
        })
        ->rawColumns(['date', 'particularities', 'userStatus'])
        ->orderColumn('date', 'date $1')
        ->make();
    }
}
