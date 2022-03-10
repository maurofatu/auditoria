@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">{{ __('Resultados') }}</div>

                </div>
            </div>


            <div class="col-xl-3 col-lg-6 mt-3">
                <div class="card card-stats mb-4 mb-xl-0">
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
                <div class="card card-stats mb-4 mb-xl-0">
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
                <div class="card card-stats mb-4 mb-xl-0">
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

            <!-- CONTENT GRAPHIC 1 -->
            <div class="col-md-12 mt-5" id="graphicCities"></div>

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

            function getVotes() {
                intervalTime = setInterval(searchVotes, 5000);
            }


            getVotes();

        });
    </script>
@endsection
