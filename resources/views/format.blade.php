@extends('layouts.app')

@section('content')

<div class="container">

<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
  
        <div class="card" style="background-color: hotpink;color:white;">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-12 text-center">
                  Elecciones Regionales 2023
                </div>
              </div>
            </div>
          </div>
  
      <hr>
  
      <p class="fs-4 text-center">
        PROCESO DE REPORTE FORMAULARIO E-14 POR CANDIDATO
      </p>
  
      <div class="col-12 text-center mt-3">
        <a href="{{ route('factvote.votesalcaldia') }}" class="btn btn-primary btn-lg" style="background-color: purple;">Alcaldia</a>
      </div>
  
  
      <div class="col-12 text-center mt-3">
        <a href="{{ url('votesgobernacion') }}" class="btn btn-primary btn-lg" style="background-color: orange;">Gobernación</a>
      </div>
  
      <p class="fs-4 text-center">
        Seleccione la tarjeta electoral que va a reportar
      </p>
  
    </div>
  </div>

</div> <!-- CONTAINER -->

@endsection