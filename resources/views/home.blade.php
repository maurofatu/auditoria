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
  
      <div class="col-12 text-center mt-3">
  
        <a href="{{ route('factcountvote.create') }}" class="btn btn-primary btn-lg" style="background-color: green;">Cuenta Votos</a>
  
      </div>
  
      <p class="text-justify">
        Debe reportarse a las 08:00 am el total de votantes y dar click en ok. A las 8:30, 10:00 am, 12:00 m; 2:00 p.m. y 3:40 pm debe reportar la cantidad acumulada de votantes por mesa.  Esta tarea se realiza en aproximadamente 30 segundos en cada segmento de dos horas.
      </p>
  
      <div class="col-12 text-center mt-3">
  
        <a href="{{ url('format') }}" class="btn btn-primary btn-lg">Registro E-14</a>
  
      </div>
  
      <p class="text-justify">
        Reporte que se hace una vez se termina el escrutinio y se oficializa la información en el formulario E-14. Al final del registro de datos se debe tomar fotografía del formato E-14 y dar clic en guardar.
      </p>
  
      
  
    </div>
  </div>
</div> <!-- CONTAINER -->
@endsection
