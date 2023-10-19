@extends('layouts.app')

@section('content')

<div class="container">

<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3" style="
  background-color: red; color:white;">
                <div class="row">
                    <div class="col-12 text-center">
                        <b>Elecciones Regionales 2023 - Alcaldia</b>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

<form action="{{ route('factvote.store') }}" method="post" name="factvote" id="factvote">
    @csrf

    <div class="row align-items-start d-flex align-items-center">

    @foreach ($data as $key => $item)
            <div class="col-2">
                <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                    <img src="{{ asset('/img/usericon.png') }}" width="40px" alt="...">
                </span>
            </div>
            <div class="col-7">{{ $item }}</div>
            <div class="col-3">
                <input type="number" class="form-control" id="{{$key}}votos" name="{{$key}}votos" aria-describedby="votos"
                    placeholder="#" pattern="[0-9]*" inputmode="numeric">
            </div>
        @endforeach

    </div>

    <div class="row align-items-start d-flex align-items-center">
    <div class="col-md-12 mt-4 text-center">
                
        <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Registrar">

      </div>
    </div>



</form>

</div> <!-- CONTAINER -->

@endsection