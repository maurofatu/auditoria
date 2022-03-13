@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h2><b>{{ __('Resultados Cuenta Votos') }}</b></h2></div>

                </div>
            </div>


        <div id="count"></div>
        {{-- <div id="1"></div>
        <div id="2"></div>
        <div id="3"></div>
        <div id="4"></div>
        <div id="5"></div>
        <div id="6"></div>
        <div id="7"></div> --}}
   


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
    <script src="{{ asset('js/charts.js') }}"></script>
    <script src="{{ asset('js/function.js') }}"></script>
    <script>
        $(document).ready(function() {

            countVotesRequest();
            
            // searchVotes();
            // citiesVotes();
            // let intervalTime;

            // function getVotes() {
            //     intervalTime = setInterval(searchVotes, 5000);
            // }


            // getVotes();

        });
    </script>
@endsection
