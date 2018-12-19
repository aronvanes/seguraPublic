@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Repetities</h1>
                @management
                    <h2><a href="{{route('rehearsals.create')}}">Toevoegen</a></h2>
                @endmanagement
                <table class="table">
                    <thead>
                        <th>Datum</th>
                        <th>Opmerking</th>
                        @active<th>status</th>@endactive
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('footerscripts')
    <script>
        $(function() {
            $('.table').DataTable({
                lengthMenu: [10],
                pagingType: "full_numbers",
                searching: false,
                lengthChange: false,
                language: {
                    "sProcessing": "Bezig...",
                    "sLengthMenu": "_MENU_ resultaten weergeven",
                    "sZeroRecords": "Geen resultaten gevonden",
                    "sInfo": "_START_ tot _END_ van _TOTAL_ resultaten",
                    "sInfoEmpty": "Geen resultaten om weer te geven",
                    "sInfoFiltered": " (gefilterd uit _MAX_ resultaten)",
                    "sInfoPostFix": "",
                    "sSearch": "Zoeken:",
                    "sEmptyTable": "Geen resultaten aanwezig in de tabel",
                    "sInfoThousands": ".",
                    "sLoadingRecords": "Een moment geduld aub - bezig met laden...",
                    "oPaginate": {
                        "sFirst": "Eerste",
                        "sLast": "Laatste",
                        "sNext": "Volgende",
                        "sPrevious": "Vorige"
                    },
                    "oAria": {
                        "sSortAscending": ": activeer om kolom oplopend te sorteren",
                        "sSortDescending": ": activeer om kolom aflopend te sorteren"
                    }
                },
                processing: true,
                serverSide: true,
                ajax: '{{Route('rehearsals.getRehearsals')}}',
                columns: [
                    {data: 'date', name: 'date'},
                    {data: 'particularities', name: 'particularities'},
                    @active{data: 'userStatus', name: 'userStatus'},@endactive
                ]
            });
        })
    </script>

    <script>
        $(function() {
            $('.table').on('click', '.user_rehearsal_status', function() {
                $.post('{{Route('usersRehearsals.updateStatus')}}',
                {
                    _token: '{{csrf_token()}}',
                    rehearsal: $(this).data('rehearsal'),
                    status: $(this).val()
                })
            });
        });
    </script>
@endsection
