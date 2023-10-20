@extends('layouts.app')

@section('content')

<div class="container">

<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-2">
        <div class="card">
            <div class="card-body p-3" style="
  background-color: red; color:white;">
                <div class="row">
                    <div class="col-12 text-center">
                        @if ($id == 1)
                        <b>Elecciones Regionales 2023 - Alcaldia</b>    
                        @else
                        <b>Elecciones Regionales 2023 - Gobernación</b>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

<form action="{{ route('factvote.store') }}" method="post" name="factvote" id="factvote">
    @csrf

    <input type="hidden" name="election" id="election"  value="{{ $id }}">
    {{-- <input type="hidden" name="mesvot" id="mesvot"  value="{{ $mesvot }}"> --}}

    <div class="row justify-content-center mb-4">
        <div class="col-md-2">
            <div class="form-group">
                <label for="munvot">Municipio Votación</label>
                <select class="form-control js-example-basic-single" id="munvot" name="munvot"
                    onchange="searchLocation(event,this.form)" required>
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
                    onchange="searchTable(event,this.form)" required>
                    <option value="" selected>Seleccione...</option>
                </select>
                @error('lugvot')
                    <small style="color: #FF0000"> {{ $message }} </small>
                @enderror
            </div>
        </div>
        <div class="col-md-3 mt-2">
            <div class="form-group">
                <label for="mesvot">Mesa de Votación</label>
                <select class="form-control js-example-basic-single" id="mesvot" name="mesvot"
                    onchange="" required>
                    <option value="" selected>Seleccione...</option>
                </select>
                @error('mesvot')
                    <small style="color: #FF0000"> {{ $message }} </small>
                @enderror
            </div>
        </div>
    </div>

    <div id="ndivcandidatesVotes" class="row align-items-start d-flex align-items-center">

    @foreach ($dim_people as $item)
            <div class="col-2">
                <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                    <img src="{{ asset('/img/usericon.png') }}" width="40px" alt="...">
                </span>
            </div>
            <div class="col-7">{{ $item->name }}</div>
            <div class="col-3">
                <input type="number" class="form-control" id="vote{{$item->id}}" name="vote{{$item->id}}" aria-describedby="vote"
                    placeholder="#" pattern="[0-9]*" inputmode="numeric" required>
            </div>
        @endforeach

        <div class="col-md-12 mt-4 text-center">
                
            <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Enviar">
    
          </div>

    </div>

    <div class="row align-items-start d-flex align-items-center">
    
    </div>



</form>

</div> <!-- CONTAINER -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/function.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            // document.getElementById('ndivcandidatesVotes').style.visibility = "hidden";

        });

        

        

        
    </script>
@endsection