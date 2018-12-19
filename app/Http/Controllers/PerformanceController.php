<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Performance;
use App\UserPerformance;
use Illuminate\Http\Request;

use Auth;
use DataTables;

class PerformanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager')->only('create', 'store', 'update');
    }

    public function index()
    {
        return view('performances.index');
    }

    public function getPerformances()
    {
        $performances = Performance::future();

        return DataTables::eloquent($performances)
        ->editColumn('occasion', function($performance) {
            return '<a href="'.Route('performances.show', $performance->id).'">'.$performance->occasion.'</a>';
        })
        ->editColumn('date', function($performance) {
            return'<a href="'.Route('performances.show', $performance->id).'">'.$performance->getDate().'</a>';
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
        ->rawColumns(['occasion', 'date', 'status'])
        ->orderColumn('occasion', 'occasion $1')
        ->orderColumn('date', 'date $1')
        ->orderColumn('status', 'status $1')
        ->make();
    }

    public function getPastPerformances()
    {
        $performances = Performance::past();

        return DataTables::eloquent($performances)
            ->editColumn('occasion', function($performance) {
                return '<a href="'.Route('performances.show', $performance->id).'">'.$performance->occasion.'</a>';
            })
            ->editColumn('date', function($performance) {
                return'<a href="'.Route('performances.show', $performance->id).'">'.$performance->getDate().'</a>';
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

            ->rawColumns(['occasion', 'date', 'status'])
            ->orderColumn('occasion', 'occasion $1')
            ->orderColumn('date', '-date $1')

            ->make();

    }

    public function create()
    {
        return view('performances.create');
    }

    public function store(Request $request)
    {
        $performanceValues = [];
        $contractValues = [];

        foreach($request->all() as $key => $value) {
            if(strpos($key, 'contract_') === false) {
                $performanceValues[$key] = $value;
            } else {
                $newKey = str_replace('contract_', '', $key);
                $contractValues[$newKey] = $value;
            }
        }

        $performance = Performance::create($performanceValues);
        $performance->addUsers();
        $contract = new Contract();
        $contract->performance_id = $performance->id;
        $contract->fill($contractValues)->save();

        return redirect()->route('performances.show', $performance);
    }

    public function show(Performance $performance)
    {
        $contract = $performance->contract;
        $mails = $performance->mails;
        $userPerformances = $performance->getUsersGroupedByInstrument();
        switch(Auth::user()->access_level) {
            case 11:
                $viewName = 'show_11';
                break;
            case 33:
                $viewName = 'show_33';
                break;
            case 66:
            case 88:
            case 99:
                $viewName = 'show_66';
                break;
        }
        return view('performances.'.$viewName, compact('performance', 'contract', 'mails', 'userPerformances'));
    }

    public function update(Performance $performance, Request $request)
    {
        $performanceValues = [];
        $contractValues = [];

        foreach($request->all() as $key => $value) {
            if(strpos($key, 'contract_') === false) {
                $performanceValues[$key] = $value;
            } else {
                $newKey = str_replace('contract_', '', $key);
                $contractValues[$newKey] = $value;
            }
        }

        $performance->update($performanceValues);
        $performance->contract->update($contractValues);
        return back();
    }
}
