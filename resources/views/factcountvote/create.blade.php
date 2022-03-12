@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Camara de Representantes - Partido Liberal') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form action="{{ route('factcountvote.store') }}" method="post" name="factcountvote"
                            id="factcountvote">
                            @csrf


                            <!-- Datos Votacion -->
                            <h3 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                                Cuenta Votos
                            </h3>

                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="munvotfcv">Municipio Votación</label>
                                        <select class="form-control js-example-basic-single" id="munvotfcv" name="munvotfcv"
                                            onchange="searchLocationFcv(event)" required>
                                            <option value="" selected>Seleccione...</option>
                                            @foreach ($data['dim_cities'] as $dim_city)
                                                <option value="{{ $dim_city->value }}"> {{ $dim_city->label }} </option>
                                            @endforeach
                                        </select>
                                        @error('munvotfcv')
                                            <small style="color: #FF0000"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="lugvotfcv">Lugar Votación</label>
                                        <select class="form-control js-example-basic-single" id="lugvotfcv" name="lugvotfcv"
                                            onchange="searchTableFcv(event)" required>
                                            <option value="" selected>Seleccione...</option>
                                        </select>
                                        @error('lugvotfcv')
                                            <small style="color: #FF0000"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mesvotfcv">Mesa de Votación</label>
                                        <select class="form-control js-example-basic-single" id="mesvotfcv" name="mesvotfcv"
                                            onchange="searchPotential(event)" required>
                                            <option value="" selected>Seleccione...</option>
                                        </select>
                                        @error('mesvotfcv')
                                            <small style="color: #FF0000"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-3" id="divPotentialVotes">

                                <div class="col-md-2" style="align-self: center;text-align: right;">
                                    <div class="form-group">
                                        <label for="potentialvotes"><b>Potencial de Votantes</b></label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="potentialvotes"
                                            id="potentialvotes" required />
                                        @error('potentialvotes')
                                            <small style="color: #FF0000"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-3">

                                <div class="col-md-2" style="align-self: center;text-align: right;">
                                    <div class="form-group">
                                        <label for="countvotes">Cantidad Votos</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="countvotes" id="countvotes"
                                            required />
                                        @error('countvotes')
                                            <small style="color: #FF0000"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4 text-center">

                                <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Enviar">

                            </div>





                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/function.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
