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
            <h4>Monitoreo Reporte E-14 - Coordinador de Puesto</h4>
        </div>
        <div class="col-12 mt-2">
            <h5>Municipio: {{ $data['fact_permits']->factPollingStation->dimCity->description }}</h5>
            <h5>Puesto: {{ $data['fact_permits']->factPollingStation->dimLocation->description }}</h5>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-10">
            @forelse ($data['fact_polling_station'] as $polling_station)
            <button type="button" class="btn btn-outline-dark position-relative m-3 px-3 rounded-pill">
                {{ ($polling_station->fk_dim_tables <= 9 ? '0' : '') . $polling_station->fk_dim_tables }}
                @if($polling_station->fk_dim_cities == 1)
                    @if($polling_station->amount_dim_elections_2 > 0)
                        <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill {{ ($polling_station->url_photo_e4_dim_elections_2) ? 'bg-success' : 'bg-danger' }}">
                            G
                        </span>
                    @endif
                @endif
                @if($polling_station->amount_dim_elections_1 > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill {{ ($polling_station->url_photo_e4_dim_elections_1) ? 'bg-success' : 'bg-danger' }}">
                        A
                    </span>
                @endif
            </button>
            @empty
            No hay datos
            @endforelse
        </div>
    </div>
    <div class="row">
        <p class="m-0">
            <button type="button" class="btn btn-outline-dark position-relative m-2 px-3 rounded-pill">
                #
                @if($data['fact_permits']->factPollingStation->fk_dim_cities == 1)
                <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-success">
                    G
                </span>
                @endif
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    A
                </span>
            </button>
        </p>
        <p class="m-0">
            #: Número de mesa
        </p>
        @if($data['fact_permits']->factPollingStation->fk_dim_cities == 1)
        <p class="m-0">
            Circulo con G a la izquierda: Gobernación
        </p>
        @endif
        <p class="m-0">
            Circulo con A a la derecha: Alcaldia
        </p>
        <p class="m-0">
            Circulo de color rojo, se cargaron los votos pero sin foto del E-14
        </p>
        <p class="m-0">
            Circulo de color verde, se cargaron los votos con foto del E-14
        </p>
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