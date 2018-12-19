@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{Form::open(['route' => ['performances.store']])}}
                <div class="col-md-12">
                    <h1>Optreden toevoegen</h1>
                    <h2>Algemene info</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-data">
                                {{Form::label('date', 'Datum:')}}
                                {{Form::date('date', null, ['placeholder' => 'datum'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('place', 'Plaats:')}}
                                {{Form::text('place', null, ['placeholder' => 'plaats'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('type', 'Soort:')}}
                                {{Form::select('type', ['open' => 'open', 'besloten' => ' besloten'], null, ['placeholder' => 'soort'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('status', 'Status:')}}
                                {{Form::select('status', ['nieuw' => 'nieuw', 'in behandeling' => 'In behandeling', 'bevestigd' => 'Bevestigd', 'geannuleerd' => 'Geannuleerd'], null, ['placeholder' => 'status'])}}
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="info-data">
                                {{Form::label('time', 'Tijd:')}}
                                {{Form::text('time', null, ['placeholder' => 'tijd'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('occasion', 'Gelegenheid:')}}
                                {{Form::text('occasion', null, ['placeholder' => 'gelegenheid'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('deadline', 'Deadline:')}}
                                {{Form::date('deadline', null, ['placeholder' => 'deadline'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('type', 'Betaald/Onbetaald:')}}
                                {{Form::select('type', ['Betaald' => 'Betaald', 'Onbetaald' => 'Onbetaald'], null, ['placeholder' => 'Betaald/Onbetaald'])}}
                            </div>
                        </div>
                        <div class="row"></div>
                        <div class="col-md-12">
                            <div class="info-data">
                                {{Form::label('info', 'Meer info:')}}
                                {{Form::textarea('info', null, ['placeholder' => 'meer info'])}}
                            </div>
                        </div>
                    </div>
                    <h2>Contract info</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-data">
                                {{Form::label('contract_name', 'Bedrijfsnaam:')}}
                                {{Form::text('contract_name', null, ['placeholder' => 'bedrijfsnaam'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_tel', 'Telefoon:')}}
                                {{Form::text('contract_tel', null, ['placeholder' => 'telefoon'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_address', 'Adres:')}}
                                {{Form::text('contract_address', null, ['placeholder' => 'adres'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_place', 'Plaats:')}}
                                {{Form::text('contract_place', null, ['placeholder' => 'plaats'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_travel_expenses', 'Reiskosten:')}}
                                {{Form::number('contract_travel_expenses', null, ['placeholder' => 'reiskosten', 'step' => 'any'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_rate_act', 'Act:')}}
                                {{Form::number('contract_rate_act', null, ['placeholder' => 'act', 'step' => 'any'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-data">
                                {{Form::label('contract_contact', 'Contactpersoon:')}}
                                {{Form::text('contract_contact', null, ['placeholder' => 'contactpersoon'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_email', 'Email:')}}
                                {{Form::text('contract_email', null, ['placeholder' => 'email'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_zip', 'Postcode:')}}
                                {{Form::text('contract_zip', null, ['placeholder' => 'postcode'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_rate_performance', 'Tarief:')}}
                                {{Form::number('contract_rate_performance', null, ['placeholder' => 'tarief'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_rate_costumes', 'Kostuums:')}}
                                {{Form::number('contract_rate_costumes', null, ['placeholder' => 'kostuums', 'step' => 'any'])}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="info-data">
                                {{Form::label('contract_other', 'Aanbod:')}}
                                {{Form::textarea('contract_other', null, ['placeholder' => 'aanbod'])}}
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_details', 'Overige afspraken:')}}
                                {{Form::textarea('contract_details',null, ['placeholder' => 'overige afspraken'])}}
                            </div>
                        </div>
                    </div>
                </div>
                {{Form::submit('opslaan')}}
            {{Form::close()}}
        </div>
    </div>
@endsection
