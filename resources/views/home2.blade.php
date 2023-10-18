@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h2><b>{{ __('Resultados Generales') }}</b></h2></div>

                </div>
            </div>


            <div class="col-xl-3 col-lg-6 mt-3">
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
            </div>

            <div class="col-xl-3 col-lg-6 mt-3">
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
            </div>

            <div class="col-xl-3 col-lg-6 mt-3">
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
            </div>


            <!-- CONTENT GRAPHIC 1 -->
            <div class="col-md-9 mt-3" id="graphic"></div>

            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header text-center"><h2><b>{{ __('Resultados por Municipio') }}</b></h2></div>

                </div>
            </div>

            @for ($i=1;$i<=7;$i++)
                
            <div class="col-xl-3 col-lg-6 mt-3">
                <div class="card card-stats mb-4 mb-xl-0" style="border-color: salmon">
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-center text-muted mb-0">{{ $data['cities'][$i] }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="h5 text-center col-4">L101</div>
                            <div class="h5 text-center col-4">L102</div>
                            <div class="h5 text-center col-4">L103</div>
                            <div class="h5 text-center col-4" id="{{ $i }}l101"> -- </div>
                            <div class="h5 text-center col-4" id="{{ $i }}l102"> -- </div>
                            <div class="h5 text-center col-4" id="{{ $i }}l103"> -- </div>
                        </div>

                    </div>
                </div>
            </div>

            @endfor

            


            <!-- CONTENT GRAPHIC 1 -->
            <div class="col-md-12 mt-3" id="graphicCities"></div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
    <script src="{{ asset('js/charts.js') }}"></script>
    <script src="{{ asset('js/function.js') }}"></script>
    <script>
        $(document).ready(function() {
            
            searchVotes();
            citiesVotes();
            let intervalTime;
            let intervalTimeTwo;

            function getVotes() {
                intervalTime = setInterval(searchVotes, 5000);
            }

            function getVotescities() {
                intervalTimetwo = setInterval(citiesVotes, 5000);
            }


            getVotes();
            getVotescities();

        });
    </script>
@endsection
