<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;
use DataTables;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager')->only('create', 'store');
        $this->middleware('updateMember')->only('show', 'update');
    }

    public function index()
    {
        return view('members.index');
    }

    public function printAllUsers(Request $request)
    {
        $users = User::getUsers();
        if ($request->has('status') && !is_null($request->status)) {
            return DataTables::of($users)
                ->editColumn('firstname', function($users) {
                        return'<a href="'.Route('members.show', $users->id).'">'.$users->getFirstname().'</a>';

                })
                ->filter(function ($instance) use ($request) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                        return Str::contains($row['status'], $request->status);
                    });
                })
                ->rawColumns(['firstname', 'name', 'city','function'])
                ->make();

        } else {

            return DataTables::of($users)
                ->editColumn('firstname', function($users) {
                    if(Auth::user()->isAdmin()) {
                        return'<a href="'.Route('members.show', $users->id).'">'.$users->getFirstname().'</a>';
                    }
                    return $users->getFirstname();
                })
                ->rawColumns(['firstname', 'name', 'city','function'])
                ->make();

        }

    }

    public function create(User $members)
    {
        return view('members.create' , compact('members'));
    }

    public function show(User $members)
    {
        return view('members.show' , compact('members'));
    }
    public function update(User $members, Request $request)
    {
        $members->update($request->all());
        return back();
    }
    public function store(Request $request)
    {
        $members = User::create($request->all());
        return redirect()->route('members.show', $members);
    }
}
