@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Leden</h1>
                @management
                    <h2><a href="{{route('members.create')}}">Toevoegen</a></h2>
                @endmanagement
                <form method="post" id="search-form" class="form-inline" role="form">
                    <div class="form-group">
                        <label for="">status</label>
                        <select name="status" id="status" class="form-control" type="text">
                            <option value="actief">Actief</option>
                            <option value="aankomend">Aankomend</option>
                            <option value="oud">Oud</option>
                            <option value="afvalwervingsdag">Afvallers werving</option>
                            <option value="non actief">non-actief</option>
                            <option value="afvalkweekvijver">afvallers kweekvijver</option>
                            <option value="oud niet-spelend">oud niet-spelend</option>
                            <option value="aanmeldingwervingsdag">aanmelding werving</option>
                            <option value="niet-spelend">niet-spelend</option>
                            <option value="">Toon alles</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <table class="table">
                    <thead>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Woonplaats</th>
                    <th>Instrument</th>
                    <th>Status</th>
                    <th>lid sinds</th>
                    <th>lid tot</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('footerscripts')
    <script>
        $(function() {
           var oTable = $('.table').DataTable({
                lengthMenu: [20],
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
                ajax: {
                    url:'{{Route('members.printAllUsers')}}',
                    data: function (d) {
                        d.status = $('select[name=status]').val();
                }
                },
                columns: [
                    {data: 'firstname', name: 'firstname'},
                    {data: 'name', name: 'name'},
                    {data: 'city', name: 'city'},
                    {data: 'function', name: 'function'},
                    {data: 'status', name: 'status'},
                    {data: 'start_date', name: 'start_date'},
                    {data: 'end_date', name: 'end_date'},
                ]
            });
            $('#search-form').on('submit', function(e) {
                oTable.draw();
                e.preventDefault();
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
