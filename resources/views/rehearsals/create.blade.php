@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{Form::open(['route' => ['rehearsals.store']])}}
                <div class="col-md-12">
                    <h1>Repetitie toevoegen</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-data">
                                {{Form::label('date', 'Datum:')}}
                                {{Form::date('date', null)}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-data">
                                {{Form::label('time', 'Tijd:')}}
                                {{Form::text('time', null)}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            {{Form::label('particularities', 'Opmerkingen:')}}
                            {{Form::textarea('particularities', null)}}
                        </div>
                    </div>
                </div>
                {{Form::submit('opslaan')}}
            {{Form::close()}}
        </div>
    </div>
@endsection
