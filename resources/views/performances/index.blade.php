@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Optredens</h1>
                @management
                    <h2><a href="{{route('performances.create')}}">Toevoegen</a></h2>
                @endmanagement
                <table class="table future">
                    <thead>
                        <th>Datum</th>
                        <th>Gelegenheid</th>
                        <th>Status</th>
                        <th>€</th>
                    </thead>
                </table>
                <h1>Verleden optredens</h1>
                <table class="table past">
                    <thead>
                    <th>Datum</th>
                    <th>Gelegenheid</th>
                    <th>Status</th>
                    <th>€</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('footerscripts')
    <script>
        $(function() {
            $('.table.future').DataTable({
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
                ajax: '{{Route('performances.getPerformances')}}',
                columns: [
                    {data: 'date', name: 'date'},
                    {data: 'occasion', name: 'occasion'},
                    {data: 'status', name: 'status'},
                    {data: 'paid', name: 'paid'},
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
            $('.table.past').DataTable({
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
                ajax: '{{Route('performances.getPastPerformances')}}',
                columns: [
                    {data: 'date', name: 'date'},
                    {data: 'occasion', name: 'occasion'},
                    {data: 'status', name: 'status'},
                    {data: 'paid', name: 'paid'},
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
@endsection
