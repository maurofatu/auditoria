@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2><b>{{ __('Faltantes E-14') }}</b></h2>
                    </div>

                </div>
            </div>

            <div class="row" id="count"></div>



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
