@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2><b>{{ __('Cuenta Votos') }}</b></h2>
                    </div>

                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-md-3 mt-2">
                    <div class="form-group">
                        <label for="munvot">Municipio Votación</label>
                        <select class="form-control js-example-basic-single" id="munvot" name="munvot"
                            onchange="searchLocationCountVotesDash(event)" required>
                            <option value="" selected>Seleccione...</option>
                            @foreach ($data['dim_cities'] as $dim_city)
                                <option value="{{ $dim_city->value }}"> {{ $dim_city->label }} </option>
                            @endforeach
                        </select>
                        @error('munvot')
                            <small style="color: #FF0000"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3 mt-2">
                    <div class="form-group">
                        <label for="lugvot">Lugar Votación</label>
                        <select class="form-control js-example-basic-single" id="lugvot" name="lugvot"
                            onchange="searchDataCountVotesDash(event)" required>
                            <option value="" selected>Seleccione...</option>
                        </select>
                        @error('lugvot')
                            <small style="color: #FF0000"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-3 justify-content-center">
                    <p class="text-center">
                    <h4>Mesas Instaladas</h4>
                    <h6 id="tablesinstaller"></h6>
                    </p>
                </div>
                <div class="col-3 justify-content-center">
                    <p class="text-center">
                    <h4>Potencial</h4>
                    <h6 id="potential"></h6>
                    </p>
                </div>
            </div>

            <div class="row justify-content-center mb-4">

                <div class="col-3">
                    <h4>Reportes Acumulados</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>9:00 a.m</td>
                                <td id="range1"></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>10:00</td>
                                <td id="range2"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>12:00</td>
                                <td id="range3"></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>2:00</td>
                                <td id="range4"></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>3:45</td>
                                <td id="range5"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-3">
                    <h4>Comportamiento</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>No. Votantes</td>
                                <td id="numbervotes"></td>
                            </tr>
                            <tr>
                                <td>Porcentaje %</td>
                                <td id="pernumbervotes"></td>
                            </tr>
                            <tr>
                                <td>Abstención</td>
                                <td id="abstention"></td>
                            </tr>
                            <tr>
                                <td>% Abstencion</td>
                                <td id="perabstention"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="col-md-6 mt-3" id="graphiccountvotes"></div>


            </div>





            {{-- <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2><b>{{ __('Resultados Generales') }}</b></h2>
                    </div>

                </div>
            </div> --}}


            {{-- <div class="col-xl-3 col-lg-6 mt-3">
                <div class="card card-stats mb-4 mb-xl-0" style="border-color: rgb(105, 192, 192, 1);">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">L101 José Marchena</h5>
                                <span class="h2 font-weight-bold mb-0" id="span101"> -- </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="col-xl-3 col-lg-6 mt-3">
                <div class="card card-stats mb-4 mb-xl-0" style="border-color: rgba(255, 99, 103, 1);">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">L102 German Rozo</h5>
                                <span class="h2 font-weight-bold mb-0" id="span102"> -- </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="col-xl-3 col-lg-6 mt-3">
                <div class="card card-stats mb-4 mb-xl-0" style="border-color: rgba(54, 162, 235, 1)">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">L103 Stella Quenza</h5>
                                <span class="h2 font-weight-bold mb-0" id="span103"> -- </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            <!-- CONTENT GRAPHIC 1 -->
            {{-- <div class="col-md-9 mt-3" id="graphic"></div>

            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h2><b>{{ __('Resultados por Municipio') }}</b></h2>
                    </div>

                </div>
            </div> --}}

            {{-- @foreach ($data['dim_cities'] as $dim_city)
                <div class="col-xl-3 col-lg-6 mt-3">
                    <div class="card card-stats mb-4 mb-xl-0" style="border-color: salmon">
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-center text-muted mb-0">{{ $dim_city->label }}
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="h5 text-center col-4">L101</div>
                                <div class="h5 text-center col-4">L102</div>
                                <div class="h5 text-center col-4">L103</div>
                                <div class="h5 text-center col-4" id="{{ $dim_city->value }}l101"> -- </div>
                                <div class="h5 text-center col-4" id="{{ $dim_city->value }}l102"> -- </div>
                                <div class="h5 text-center col-4" id="{{ $dim_city->value }}l103"> -- </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach --}}



            <!-- CONTENT GRAPHIC 1 -->
            {{-- <div class="col-md-12 mt-3" id="graphicCities"></div> --}}

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
    <script src="{{ asset('js/charts.js') }}"></script>
    <script src="{{ asset('js/function.js') }}"></script>
    <script>
        $(document).ready(function() {

            graphicscountvotes(0,0,0,0,0);

            // searchVotes();
            // citiesVotes();
            // let intervalTime;
            // let intervalTimeTwo;

            // function getVotes() {
            //     intervalTime = setInterval(searchVotes, 5000);
            // }

            // function getVotescities() {
            //     intervalTimetwo = setInterval(citiesVotes, 5000);
            // }


            // getVotes();
            // getVotescities();

        });
    </script>
@endsection
