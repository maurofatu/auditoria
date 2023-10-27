@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 mb-xl-0 mb-2">
                <div class="card">
                    <div class="card-body p-3" style="
  background-color: red; color:white;">
                        <div class="row">
                            <div class="col-12 text-center">
                                <b>Elecciones Regionales 2023</b>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>


        <div class="row justify-content-center mb-4">
            <div class="col-md-3 mt-2">
                <div class="form-group">
                    <label for="munvotview">Municipio Votación</label>
                    <select class="form-control js-example-basic-single" id="munvotview" name="munvotview"
                        onchange="searchLocationView(event,this.form)" required>
                        <option value="" selected>Seleccione...</option>
                        @foreach ($data['dim_cities'] as $dim_city)
                            <option value="{{ $dim_city->value }}"> {{ $dim_city->label }} </option>
                        @endforeach
                    </select>
                    @error('munvotview')
                        <small style="color: #FF0000"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
            <div class="col-md-3 mt-2">
                <div class="form-group">
                    <label for="lugvotview">Lugar Votación</label>
                    <select class="form-control js-example-basic-single" id="lugvotview" name="lugvotview"
                        onchange="searchTableView(event,this.form)" required>
                        <option value="" selected>Seleccione...</option>
                    </select>
                    @error('lugvotview')
                        <small style="color: #FF0000"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
            <div class="col-md-3 mt-2">
                <div class="form-group">
                    <label for="mesvotview">Mesa de Votación</label>
                    <select class="form-control js-example-basic-single" id="mesvotview" name="mesvotview"
                        onchange="searchE14view(event,this.form)" required>
                        <option value="" selected>Seleccione...</option>
                    </select>
                    @error('mesvotview')
                        <small style="color: #FF0000"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
        </div>


        <div class="row justify-content-center mb-3">

            <div class="col-8 mt-3" id="divImge14" style="text-align: center;">
            
                <p class="h4 mt-4"> No hay imagen disponible</p>

            </div>

        </div>
        




    </div> <!-- CONTAINER -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/function.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();


        });
    </script>
@endsection
