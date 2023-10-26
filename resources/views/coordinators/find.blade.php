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
            <hr class="mt-0" />
            <div class="col-12 mt-2">
                <h5>Municipio: {{ $data['fact_permits']->factPollingStation->dimCity->description }}</h5>
                <h5>Puesto: {{ $data['fact_permits']->factPollingStation->dimLocation->description }}</h5>
            </div>
            <hr class="mt-0" />
        </div>

        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Tipo Novedad</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['fact_news'] as $new)
                        <tr class="fila-new" data-url="{{ route('coordinators.edit', $new->id) }}">
                            <th scope="row">{{ $new->id }}</th>
                            <td>{{ $new->hora }}</td>
                            <td>{{ $new->type }}</td>
                            <td>{{ $new->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row" colspan="4">Sin Datos</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="text-center">
                <ul class="pagination">
                    @if ($data['fact_news']->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $data['fact_news']->previousPageUrl() }}"
                                rel="prev">&laquo;</a></li>
                    @endif

                    @foreach ($data['fact_news']->getUrlRange(1, $data['fact_news']->lastPage()) as $page => $url)
                        @if ($page == $data['fact_news']->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    @if ($data['fact_news']->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $data['fact_news']->nextPageUrl() }}"
                                rel="next">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                    @endif
                </ul>
            </div>

        </div>
        <hr class="mt-0" />
        <div class="row">
            <p class="m-0"><strong>Total novedades:</strong>
                {{ $data['conteo']->S + $data['conteo']->G + $data['conteo']->D }}</p>
            <p class="m-0 text-danger"><strong>Sin gestionar:</strong> {{ $data['conteo']->S }}</p>
            <p class="m-0 text-primary"><strong>Gestionados:</strong> {{ $data['conteo']->G }}</p>
            <p class="m-0 text-success"><strong>Direccionados:</strong> {{ $data['conteo']->D }}</p>
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
        // Obtén todas las filas clickeables por su clase
        const filasClickeables = document.querySelectorAll(".fila-new");

        // Agrega un evento de clic a cada fila
        filasClickeables.forEach(fila => {
            fila.addEventListener("click", () => {
                // Accede a la URL desde el atributo personalizado "data-url"
                const url = fila.getAttribute("data-url");

                // Redirige a la nueva página
                window.location.href = url;
            });
        });
    </script>
@endsection
