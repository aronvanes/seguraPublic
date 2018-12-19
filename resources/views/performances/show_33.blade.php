@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>{{$performance->occasion}}</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h2><a href="#" class="info-link active" data-for="general-info">Algemene info</a></h2>
                    </div>
                    <div class="col-md-6">
                        <h2><a href="#" class="info-link" data-for="contract-info">Contract info</a></h2>
                    </div>
                </div>
                <div class="info general-info active">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="info-data">
                                {{Form::label('date', 'Datum:')}}
                                <p>{{$performance->getDate()}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('place', 'Plaats:')}}
                                <p>{{$performance->place}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('type', 'Soort:')}}
                                <p>{{$performance->type}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('status', 'Status:')}}
                                <p>{{$performance->status}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('active', 'Actief:')}}
                                <p>{{$performance->active}}</p>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="info-data">
                                {{Form::label('time', 'Tijd:')}}
                                <p>{{$performance->time}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('occasion', 'Gelegenheid:')}}
                                <p>{{$performance->occasion}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('deadline', 'Deadline:')}}
                                <p>{{$performance->getDeadline()}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('paid', 'Betaald/Onbetaald:')}}
                                <p>{{$performance->paid}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-data">
                                {{Form::label('info', 'Meer info:')}}
                                <p>{{$performance->info}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info contract-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-data">
                                {{Form::label('contract_name', 'Bedrijfsnaam:')}}
                                <p>{{$contract->name}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_tel', 'Telefoon:')}}
                                <p>{{$contract->tel}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_address', 'Adres:')}}
                                <p>{{$contract->address}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_place', 'Plaats:')}}
                                <p>{{$contract->data}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_travel_expenses', 'Reiskosten:')}}
                                <p>{{$contract->travel_expenses}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_rate_act', 'Act:')}}
                                <p>{{$contract->rate_act}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-data">
                                {{Form::label('contract_contact', 'Contactpersoon:')}}
                                <p>{{$contract->contact}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_email', 'Email:')}}
                                <p>{{$contract->email}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_zip', 'Postcode:')}}
                                <p>{{$contract->zip}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_rate_performance', 'Tarief:')}}
                                <p>{{$contract->rate_performance}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_rate_costumes', 'Kostuums:')}}
                                <p>{{$contract->rate_costumes}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-data">
                                {{Form::label('contract_other', 'Aanbod:')}}
                                <p>{{$contract->other}}</p>
                            </div>
                            <div class="info-data">
                                {{Form::label('contract_details', 'Overige afspraken:')}}
                                <p>{{$contract->details}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footerscripts')
    <script>
        $(function() {
            $('a.info-link').on('click', function(e) {
                e.preventDefault();
                $('a.info-link').removeClass('active');
                $(this).addClass('active')

                $('.info').removeClass('active');
                $('.info.'+$(this).attr('data-for')).addClass('active');
            })
        })
    </script>
@endsection
