@extends('layouts.app')

@section('content')
    <div class="container">
       
            {{-- <div class="progress">
                <div id="test" class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">25%</div>
              </div> --}}


              <div class="tabs tab-content mb-3">
                <button class="tablink btn" onclick="openTab('tab1')">Cuenta Votos</button>
                <button class="tablink btn" onclick="openTab('tab2')">Alcaldia</button>
                <button class="tablink btn" onclick="openTab('tab3')">Gobernación</button>
            </div>
        
            <div id="tab1" class="tabcontent tab-pane">
                <!-- Contenido de la pestaña 1 -->
                @include('monitor.graphicscountvotes')
            </div>
        
            <div id="tab2" class="tabcontent tab-pane">
                <!-- Contenido de la pestaña 2 -->
                @include('monitor.graphicsalcaldia')
            </div>
        
            <div id="tab3" class="tabcontent tab-pane">
                <!-- Contenido de la pestaña 3 -->
                @include('monitor.graphicsgobernacion')
            </div>
        

              {{-- $("#test").attr("style","width: 80%"); --}}

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
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/charts.js') }}"></script>
    <script src="{{ asset('js/function.js') }}"></script>
    <script>
        $(document).ready(function() {


            $('.js-example-basic-single').select2();
            graphicscountvotes(0,0,0,0,0);
            searchDataGobernacionDepDash();
            searchDataAlcaldiaFDash();
            searchLocationAlcaldiaDash();


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

        function openTab(tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
        }
    </script>
@endsection
