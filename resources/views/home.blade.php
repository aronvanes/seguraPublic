@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Optredens</h2>
            <table class="table performances">
                <thead>
                <th>Gelegenheid</th>
                <th>Datum</th>
                <th>Status</th>
                </thead>
            </table>
            <h2>Repetities</h2>
            <table class="table rehearsals"><thead>
                <th>Datum</th>
                <th>Bijzonderheden</th>
                @active<th>status</th>@endactive
                </thead></table>
        </div>
    </div>
</div>
@endsection
@section('footerscripts')
    <script>
        $(function() {
            $('.table.performances').DataTable({
                paginate: false,
                info: false,
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
                ajax: '{{Route('home.getPerformances')}}',
                columns: [
                    {data: 'occasion', name: 'occasion'},
                    {data: 'date', name: 'date'},
                    {data: 'status', name: 'status'},
                ]
            });

            $('.table').on('click', 'tr', function() {
                var href = $(this).find("a").attr("href");
                if(href) {
                    window.location = href;
                }
            });
        })
    </script>
    <script>
        $(function() {
            $('.table.rehearsals').DataTable({
                paginate: false,
                info: false,
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
                ajax: '{{Route('home.getRehearsals')}}',
                columns: [
                    {data: 'date', name: 'date'},
                    {data: 'particularities', name: 'particularities'},
                    @active{data: 'userStatus', name: 'userStatus'},@endactive
                ]
            });

            $('.table').on('click', 'tr', function() {
                var href = $(this).find("a").attr("href");
                if(href) {
                    window.location = href;
                }
            });
        })
    </script>
    <script>
        $(function() {
            $('.table.rehearsals').on('click', '.user_rehearsal_status', function() {
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
