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
            <div class="col-md-12">
                <div id="accordion" class="info general-info active">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Verzonden mails
                                </button>
                            </h3>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                @foreach($mails as $mail)
                                    <div class="mail">
                                        <p>Verzonden: {{$mail->getDate()}}</p>
                                        <p>Naar: {{$mail->group}}</p>
                                        <p>Bericht:</p>
                                        <p>{!!$mail->message!!}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Bezetting
                                </button>
                            </h3>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <div class="col-md-12">
                                    {{Form::open(['route' => ['usersPerformances.update', $performance]])}}
                                        <table class="col-md-12">
                                            <thead>
                                                <th>Leden</th>
                                                <th>Status</th>
                                                <th>Wijzig status</th>
                                            </thead>
                                            <tbody>
                                                @foreach($userPerformances as $key => $userPerformance)
                                                    @if($loop->first)
                                                        <tr>
                                                            <td colspan="3" class="text-white spacing"><strong>{{$userPerformance->user->function}}</strong></td>
                                                        </tr>

                                                    @elseif($userPerformance->user->function != $userPerformances[$key-1]->user->function)
                                                        <tr>
                                                            <td colspan="3" class="text-white spacing"><strong>{{$userPerformance->user->function}}</strong></td>
                                                        </tr>

                                                    @endif
                                                    <tr>
                                                        <td class="text-white">{{$userPerformance->user->getFullName()}}</td>
                                                        <td><span class="status status-{{$userPerformance->status}}">&nbsp;</span></td>
                                                        <td>
                                                            @adminOrUser(Auth::user(), $userPerformance->user)
                                                                @beforedeadline($performance->deadline)
                                                                    {{Form::select('statusses['.$userPerformance->id.']', ['wel' => 'wel', 'niet' => 'niet', 'onzeker' => 'onzeker', 'onbekend' => 'onbekend'], $userPerformance->status)}}
                                                                @endbeforedeadline
                                                            @endadminOrUser</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{Form::submit('opslaan')}}
                                    {{Form::close()}}
                                </div>
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
