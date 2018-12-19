@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="justify-content-center">
            {{Form::open(['route' => ['members.store', $members]])}}
            <div class="col-md-12">
                <h1>Nieuw lid</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-data">
                            {{Form::label('firstname', 'Voornaam:')}}
                            {{Form::text('firstname', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('insertion', 'Tussenvoegsel:')}}
                            {{Form::text('insertion', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('name', 'Achternaam:')}}
                            {{Form::text('name', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('date_of_birth', 'Geboortedatum:')}}
                            {{Form::text('date_of_birth', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('gender', 'Geslacht:')}}
                            {{Form::select('gender', ['man' => 'man', 'vrouw' => 'vrouw'], null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('street', 'Straat + nr:')}}
                            {{Form::text('street', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('zip', 'Postcode:')}}
                            {{Form::text('zip', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('city', 'Woonplaats:')}}
                            {{Form::text('city', null)}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-data">
                            {{Form::label('tel', 'Telefoon:')}}
                            {{Form::text('tel', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('tel_business', 'Telefoon werk:')}}
                            {{Form::text('tel_business', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('tel_mobile', 'Telefoon mobiel:')}}
                            {{Form::text('tel_mobile', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('email', 'Email:')}}
                            {{Form::text('email', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('email2', 'Email2:')}}
                            {{Form::text('email2', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('start_date', 'Lid sinds:')}}
                            {{Form::text('start_date',null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('end_date', 'Lid tot:')}}
                            {{Form::text('end_date', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('function', 'Instrument:')}}
                            {{Form::select('function', [ '' => '', 'Surdo Terceira' => 'Surdo Terceira', 'Surdo Secunda' => 'Surdo Secunda', 'Surdo Primeira' => 'Surdo Primeira', 'Caixa' => 'Caixa', 'Repenique' => 'Repenique', 'Chocalho' => 'Chocalho', 'Tamborime' => 'Tamborime', 'Vaandeldrager' => 'Vaandeldrager', 'Dirigent' => 'Dirigent'], null)}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-data">
                            {{Form::label('board_member', 'Lid bestuur:')}}
                            {{Form::checkbox('board_member',1, null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('honorary_board', 'Ere bestuur:')}}
                            {{Form::checkbox('honorary_board',1,null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('first_instrumentr', 'Eerste speler:')}}
                            {{Form::checkbox('first_instrument',1, null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('booking_manager', 'Bookings manager:')}}
                            {{Form::checkbox('booking_manager',1, null)}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2>Persoonlijke gegevens</h2>
                        <div class="info-data">
                            {{Form::label('username', 'Gebruikersnaam:')}}
                            {{Form::text('username', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('password', 'Wachtwoord:')}}
                            {{Form::password('password', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('account_number', 'IBAN:')}}
                            {{Form::text('account_number',null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('deb_number', 'debiteur nummer:')}}
                            {{Form::text('deb_number', null)}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2>Admin gegevens</h2>
                        <div class="info-data">
                            {{Form::label('access_level', 'access level:')}}
                            {{Form::select('access_level', ['0' => 'Geen toegang', '11' => 'Spelend lid', '33' => 'Niet-spelend lid', '66' => 'Bestuur', '99' => 'dirigent', '88' => 'Bookings manager', '99' => 'Admin'], null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('hash', 'hash:')}}
                            {{Form::text('hash', null)}}
                        </div>
                        <div class="info-data">
                            {{Form::label('status', 'status:')}}
                            {{Form::select('status', ['actief' => 'Actief lid', 'non-actief' => 'Non-actief lid', 'niet-spelend' => 'Niet-spelend lid', 'aankomend' => 'Aankomend lid / Kweekvijver', 'afvalkweekvijver' => 'Afvaller kweekvijver', 'wervingsdag' => 'Aanmelding wervingsdag', 'afvalwervingsdag' => 'Afvaller wervingsdag'], null)}}
                        </div>

                    </div>

                </div>
                {{Form::submit('opslaan')}}
                {{Form::close()}}
            </div>
        </div>

@endsection