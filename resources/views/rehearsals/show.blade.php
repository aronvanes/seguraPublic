@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{Form::open(['route' => ['rehearsals.update', $rehearsal]])}}
                <div class="col-md-12">
                    <h1>{{$rehearsal->getDate()}}</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-data">
                                {{Form::label('date', 'Datum:')}}
                                {{Form::date('date', $rehearsal->date)}}
                            </div>
                            <div class="info-data usertable">
                                <p>Leden:</p>
                                <p>{{$rehearsal->activeRehearsalUsers->count()}}/{{$rehearsal->rehearsalUsers->count()}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-data use">
                                {{Form::label('time', 'Tijd:')}}
                                {{Form::text('time', $rehearsal->time)}}
                            </div>
                            <div class="info-data usertable">
                                <p>Percentage:</p>
                                <p>{{$rehearsal->getActiveUsersPercentage()}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            {{Form::label('particularities', 'Opmerkingen:')}}
                            {{Form::textarea('particularities', $rehearsal->particularities)}}
                        </div>
                    </div>
                </div>
                {{Form::submit('opslaan')}}
            {{Form::close()}}
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{Form::open(['route' => ['usersRehearsals.update', $rehearsal]])}}
                    <table class="col-md-12 usertable">
                        <thead>
                            <th>Leden</th>
                            <th>Status</th>
                            <th>Wijzig status</th>
                        </thead>
                        <tbody>
                            @foreach($rehearsalUsers as $key => $rehearsalUser)
                                @if($loop->first)
                                    <tr>
                                        <td colspan="3"><strong>{{$rehearsalUser->user->function}}</strong></td>
                                    </tr>
                                @elseif($rehearsalUser->user->function != $rehearsalUsers[$key-1]->user->function)
                                    <tr>
                                        <td colspan="3"><strong>{{$rehearsalUser->user->function}}</strong></td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>{{$rehearsalUser->user->getFullName()}}</td>
                                    <td><span class="status status-{{$rehearsalUser->status}}">&nbsp;</span></td>
                                    <td>{{Form::select('statusses['.$rehearsalUser->id.']', ['wel' => 'wel', 'afgemeld' => 'afgemeld', 'te_laat' => 'te laat', 'niet' => 'niet', 'niet afgemeld' => 'niet afgemeld'], $rehearsalUser->status)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{Form::submit('opslaan')}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
