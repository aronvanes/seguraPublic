@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{Form::open(['route' => ['performances.update', $performance]])}}
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
                                    {{Form::date('date', $performance->date)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('place', 'Plaats:')}}
                                    {{Form::text('place', $performance->place)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('type', 'Soort:')}}
                                    {{Form::select('type', ['open' => 'open', 'besloten' => ' besloten'], $performance->type)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('status', 'Status:')}}
                                    {{Form::select('status', ['nieuw' => 'nieuw', 'in behandeling' => 'In behandeling', 'bevestigd' => 'Bevestigd', 'geannuleerd' => 'Geannuleerd'], $performance->status)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('active', 'website:')}}
                                    {{Form::select('active', ['ja' => 'ja', 'nee' => 'nee'], $performance->active)}}
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="info-data">
                                    {{Form::label('time', 'Tijd:')}}
                                    {{Form::text('time', $performance->time)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('occasion', 'Gelegenheid:')}}
                                    {{Form::text('occasion', $performance->occasion)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('deadline', 'Deadline:')}}
                                    {{Form::date('deadline', $performance->deadline)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('paid', 'Betaald/Onbetaald:')}}
                                    {{Form::select('paid', ['Betaald' => 'Betaald', 'Onbetaald' => 'Onbetaald'], $performance->paid)}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-data">
                                    {{Form::label('info', 'Meer info:')}}
                                    {{Form::textarea('info', $performance->info)}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info contract-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-data">
                                    {{Form::label('contract_name', 'Bedrijfsnaam:')}}
                                    {{Form::text('contract_name', $contract->name)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('contract_tel', 'Telefoon:')}}
                                    {{Form::text('contract_tel', $contract->tel)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('contract_address', 'Adres:')}}
                                    {{Form::text('contract_address', $contract->address)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('contract_place', 'Plaats:')}}
                                    {{Form::text('contract_place', $contract->place)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('contract_travel_expenses', 'Reiskosten:')}}
                                    {{Form::number('contract_travel_expenses', $contract->travel_expenses, ['step' => 'any'])}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('contract_rate_act', 'Act:')}}
                                    {{Form::number('contract_rate_act', $contract->rate_act, ['step' => 'any'])}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-data">
                                    {{Form::label('contract_contact', 'Contactpersoon:')}}
                                    {{Form::text('contract_contact', $contract->contact)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('contract_email', 'Email:')}}
                                    {{Form::text('contract_email', $contract->email)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('contract_zip', 'Postcode:')}}
                                    {{Form::text('contract_zip', $contract->zip)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('contract_rate_performance', 'Tarief:')}}
                                    {{Form::number('contract_rate_performance', $contract->rate_performance)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('contract_rate_costumes', 'Kostuums:')}}
                                    {{Form::number('contract_rate_costumes', $contract->rate_costumes, ['step' => 'any'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-data">
                                    {{Form::label('contract_other', 'Aanbod:')}}
                                    {{Form::textarea('contract_other', $contract->other)}}
                                </div>
                                <div class="info-data">
                                    {{Form::label('contract_details', 'Overige afspraken:')}}
                                    {{Form::textarea('contract_details', $contract->details)}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{Form::submit('opslaan')}}
            {{Form::close()}}
            <div class="col-md-12">
                <div id="accordion" class="info general-info active">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h3 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Mail sturen
                                </button>
                            </h3>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                {{Form::open(['route' => ['mails.store', $performance]])}}
                                    <div class="info-data">
                                        {{Form::label('group', 'Naar:')}}
                                        {{Form::select('group', ['alle' => 'alle actieve leden (nieuwe aanvraag)', 'wel' => 'leden met status \'wel\'', 'niet' => 'leden met status \'niet\'', 'onzeker' => 'leden met status \'onzeker\'', 'onbekend' => 'leden met status \'onbekend\''])}}
                                    </div>
                                    <div class="info-data">
                                        {{Form::label('message', '')}}
                                        {{Form::textarea('message')}}
                                    </div>
                                    {{Form::submit('versturen')}}
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
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
                                                        <td>{{Form::select('statusses['.$userPerformance->id.']', ['wel' => 'wel', 'niet' => 'niet', 'onzeker' => 'onzeker', 'onbekend' => 'onbekend'], $userPerformance->status)}}</td>
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
