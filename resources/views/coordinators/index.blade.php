@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-sm-12 mb-xl-0 mb-2">
                <div class="card" style="background-color: #0CA789;color:white;">
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-12 text-center">
                                <b>Elecciones Regionales 2023</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center mt-2">
                <h4>Monitoreo Novedades - Coordinador de Puesto</h4>
            </div>
            <div class="col-12 mt-2">
                <h5>Municipio: {{ $data['fact_permits']->factPollingStation->dimCity->description }}</h5>
                <h5>Puesto: {{ $data['fact_permits']->factPollingStation->dimLocation->description }}</h5>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                @forelse ($data['fact_polling_station'] as $polling_station)
                    <a href="{{ route('coordinators.find', ['city' => $polling_station->fk_dim_cities, 'location' => $polling_station->fk_dim_locations, 'table' => $polling_station->fk_dim_tables]) }}"
                        type="button"
                        class="btn {{ $polling_station->cantidad_s > 0 ? 'btn-danger' : ($polling_station->cantidad_g > 0 ? 'btn-primary' : ($polling_station->cantidad_d > 0 ? 'btn-success' : 'btn-outline-dark')) }} m-1 px-3 rounded-pill">{{ ($polling_station->fk_dim_tables <= 9 ? '0' : '') . $polling_station->fk_dim_tables }}</a>
                @empty
                    No hay datos
                @endforelse
            </div>
        </div>
        <div class="row">
            <p class="m-0">Color:</p>
            <p class="m-0">Blanco: Mesas sin novedades.</p>
            <p class="m-0">Rojo = mesa con novedades sin gestionar.</p>
            <p class="m-0">Azul: Novedades gestionadas</p>
            <p class="m-0">Verde: Novedades gestionadas y direccionadas</p>
        </div>

    </div> <!-- CONTAINER -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/function.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.js-example-basic-single2').select2();
            // document.getElementById("ndivPotentialVotes").hide();
            $("#ndivPotentialVotes").hide();

        });
    </script>
@endsection
