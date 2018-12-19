@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="justify-content-center">
            {{Form::open(['route' => ['members.update', $members]])}}
            <div class="col-md-12">
                <h1>Detail leden</h1>
                <div class="row">
                    @adminOrUser(Auth::user(), $members)

                        <div class="col-md-4">

                            <div class="info-data">
                                {{Form::label('firstname', 'Voornaam:')}}
                                {{Form::text('firstname', $members->firstname)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('insertion', 'Tussenvoegsel:')}}
                                {{Form::text('insertion', $members->insertion)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('name', 'Achternaam:')}}
                                {{Form::text('name', $members->name)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('date_of_birth', 'Geboortedatum:')}}
                                {{Form::date('date_of_birth', $members->date_of_birth)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('gender', 'Geslacht:')}}
                                {{Form::select('gender', ['man' => 'man', 'vrouw' => 'vrouw'], $members->gender)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('street', 'Straat + nr:')}}
                                {{Form::text('street', $members->street)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('zip', 'Postcode:')}}
                                {{Form::text('zip', $members->zip)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('city', 'Woonplaats:')}}
                                {{Form::text('city', $members->city)}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-data">
                                {{Form::label('tel', 'Telefoon:')}}
                                {{Form::text('tel', $members->tel)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('tel_business', 'Telefoon werk:')}}
                                {{Form::text('tel_business', $members->tel_business)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('tel_mobile', 'Telefoon mobiel:')}}
                                {{Form::text('tel_mobile', $members->tel_mobile)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('email', 'Email:')}}
                                {{Form::text('email', $members->email)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('email2', 'Email2:')}}
                                {{Form::text('email2', $members->email2)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('start_date', 'Lid sinds:')}}
                                {{Form::date('start_date', $members->start_date)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('end_date', 'Lid tot:')}}
                                {{Form::date('end_date', $members->end_date)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('function', 'Instrument:')}}
                                {{Form::select('function', [ '' => '', 'Surdo Terceira' => 'Surdo Terceira', 'Surdo Secunda' => 'Surdo Secunda', 'Surdo Primeira' => 'Surdo Primeira', 'Caixa' => 'Caixa', 'Repenique' => 'Repenique', 'Chocalho' => 'Chocalho', 'Tamborime' => 'Tamborime', 'Vaandeldrager' => 'Vaandeldrager', 'Dirigent' => 'Dirigent'], $members->function)}}
                            </div>
                        </div>
                    @else
                        <div class="col-md-4 usertable">
                            <div class="info-data">
                                {{Form::label('firstname', 'Voornaam:')}}
                                <p>{{$members->firstname}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('insertion', 'Tussenvoegsel:')}}
                                <p>{{$members->insertion}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('name', 'Achternaam:')}}
                                <p>{{$members->name}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('date_of_birth', 'Geboortedatum:')}}
                                <p>{{$members->getDateOfBirth()}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('gender', 'Geslacht:')}}
                                <p>{{$members->gender}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('street', 'Straat + nr:')}}
                                <p>{{$members->street}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('zip', 'Postcode:')}}
                                <p>{{$members->zip}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('city', 'Woonplaats:')}}
                                <p>{{$members->city}}</p>
                            </div>
                        </div>
                        <div class="col-md-4 usertable">
                            <div class="info-data">
                                {{Form::label('tel', 'Telefoon:')}}
                                <p>{{$members->tel}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('tel_business', 'Telefoon werk:')}}
                                <p>{{$members->tel_business}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('tel_mobile', 'Telefoon mobiel:')}}
                                <p>{{$members->tel_mobile}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('email', 'Email:')}}
                                <p>{{$members->email}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('email2', 'Email2:')}}
                                <p>{{$members->email2}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('start_date', 'Lid sinds:')}}
                                <p>{{$members->getStartDate()}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('end_date', 'Lid tot:')}}
                                <p>{{$members->end_date}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('function', 'Instrument:')}}
                                <p>{{$members->function}}</p>
                            </div>
                        </div>
                    @endadminOrUser
                    <div class="col-md-4 usertable">
                        @management
                            <div class="info-data">
                                {{Form::label('board_member', 'Lid bestuur:')}}
                                {{Form::checkbox('board_member',1, $members->board_member)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('honorary_board', 'Ere bestuur:')}}
                                {{Form::checkbox('honorary_board',1, $members->honorary_board)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('first_instrumentr', 'Eerste speler:')}}
                                {{Form::checkbox('first_instrument',1, $members->first_instrument)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('booking_manager', 'Bookings manager:')}}
                                {{Form::checkbox('booking_manager',1, $members->booking_manager)}}
                            </div>
                        @else
                            <div class="info-data">
                                {{Form::label('board_member', 'Lid bestuur:')}}
                                </p>@if($members->board_member) Ja @else Nee @endif</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('honorary_board', 'Ere bestuur:')}}
                                </p>@if($members->honorary_board) Ja @else Nee @endif</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('first_instrumentr', 'Eerste speler:')}}
                                </p>@if($members->first_instrument) Ja @else Nee @endif</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('booking_manager', 'Bookings manager:')}}
                                </p>@if($members->booking_manager) Ja @else Nee @endif</p>
                            </div>
                        @endmanagement
                    </div>
                    <div class="col-md-4 usertable">
                        <h2>Persoonlijke gegevens</h2>
                        @adminOrUser(Auth::user(), $members)
                            <div class="info-data">
                                {{Form::label('username', 'Gebruikersnaam:')}}
                                {{Form::text('username', $members->username)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('password', 'Wachtwoord:')}}
                                {{Form::password('password', array($members->password))}}
                            </div>
                            <div class="info-data">
                                {{Form::label('account_number', 'IBAN:')}}
                                {{Form::text('account_number', $members->account_number)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('deb_number', 'debiteur nummer:')}}
                                {{Form::text('deb_number', $members->deb_number)}}
                            </div>
                        @else
                            <div class="info-data">
                                {{Form::label('username', 'Gebruikersnaam:')}}
                                <p>{{$members->username}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('account_number', 'IBAN:')}}
                                <p>{{$members->account_number}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('deb_number', 'debiteur nummer:')}}
                                <p>{{$members->deb_number}}</p>
                            </div>
                        @endadminOrUser
                    </div>
                    <div class="col-md-4 usertable">
                        <h2>Admin gegevens</h2>
                        @management
                            <div class="info-data">
                                {{Form::label('access_level', 'access level:')}}
                                {{Form::select('access_level', ['0' => 'Geen toegang', '11' => 'Spelend lid', '33' => 'Niet-spelend lid', '66' => 'Bestuur', '99' => 'dirigent', '88' => 'Bookings manager', '99' => 'Admin'], $members->access_level)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('hash', 'hash:')}}
                                {{Form::text('hash', $members->hash)}}
                            </div>
                            <div class="info-data">
                                {{Form::label('status', 'status:')}}
                                {{Form::select('status', ['actief' => 'Actief lid', 'non-actief' => 'Non-actief lid', 'niet-spelend' => 'Niet-spelend lid', 'aankomend' => 'Aankomend lid / Kweekvijver', 'afvalkweekvijver' => 'Afvaller kweekvijver', 'wervingsdag' => 'Aanmelding wervingsdag', 'afvalwervingsdag' => 'Afvaller wervingsdag'], $members->status)}}
                            </div>
                        @else
                            <div class="info-data">
                                {{Form::label('access_level', 'access level:')}}
                                </p>{{$members->getAccessLevel()}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('hash', 'hash:')}}
                                <p>{{$members->hash}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('status', 'status:')}}
                                </p>{{$members->getStatus()}}</p>
                            </div>
                        @endmanagement
                    </div>

            </div>
            {{Form::submit('opslaan')}}
            {{Form::close()}}
        </div>
    </div>

@endsection
