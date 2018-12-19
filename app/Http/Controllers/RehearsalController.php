<?php

namespace App\Http\Controllers;

use App\Rehearsal;
use Illuminate\Http\Request;

use Auth;
use DataTables;
use Form;

class RehearsalController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager')->only('create', 'store', 'update');
    }

    public function index()
    {
        return view('rehearsals.index');
    }

    public function getRehearsals()
    {
        $rehearsals = Rehearsal::future();

        return DataTables::eloquent($rehearsals)
        ->editColumn('date', function($rehearsal) {
            if(Auth::user()->access_level >= 66) {
                return'<a href="'.Route('rehearsals.show', $rehearsal->id).'">'.$rehearsal->getDate().'</a>';
            }else{
                return '<p>'.$rehearsal->getDate().'</p>';
            }

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

    public function create()
    {
        return view('rehearsals.create');
    }

    public function store(Request $request)
    {
        $rehearsal = Rehearsal::create($request->all());
        $rehearsal->addUsers();
        return redirect()->route('rehearsals.show', $rehearsal);
    }


    public function show(Rehearsal $rehearsal)
    {
        $rehearsalUsers = $rehearsal->getUsersGroupedByInstrument();
        return view('rehearsals.show', compact('rehearsal', 'rehearsalUsers'));
    }

    public function update(Rehearsal $rehearsal, Request $request)
    {
        $rehearsal->update($request->all());
        return back();
    }
}
