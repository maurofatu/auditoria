@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-sm-6 mb-xl-0 mb-2">

                <div class="card" style="background-color: hotpink;color:white;">
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-12 text-center">
                                <b>Elecciones Regionales 2023</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 text-center mt-2">
                <h4>REGISTRO</h4>
                <hr class="mt-0" />
                <h5>CUENTA VOTOS</h5>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form action="{{ route('factcountvote.store') }}" method="post" name="factcountvote"
                            id="factcountvote" onsubmit="enviar();">
                            @csrf


                            <!-- Datos Votacion -->

                            <div class="row justify-content-center">
                                <div class="col-md-3 mt-2">
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
                                <div class="col-md-3 mt-2">
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
                                <div class="col-md-3 mt-2">
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
                                    <div class="form-group" id="potentialVot">
                                        <input class="form-control" type="number" name="potentialvotes" id="potentialvotes"
                                            pattern="[0-9]*" inputmode="numeric" />
                                        @error('potentialvotes')
                                            <small style="color: #FF0000"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-3" id="ndivPotentialVotes">
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
                                            pattern="[0-9]*" inputmode="numeric" required />
                                        @error('countvotes')
                                            <small style="color: #FF0000"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 mt-4 text-center">

                                <button type="submit" class="btn btn-outline-success" id="enviar"
                                    name="enviar">Enviar</button>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3 ">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-12 text-center"><b>REGISTROS</b><hr></div>
                    <div class="col-xl-2 col-4">#</div>
                    <div class="col-xl-2 col-4">Votos</div>
                    <div class="col-xl-2 col-4">Hora</div>
                </div>
                <div class="row justify-content-center" id="foreachcountvotes">

                </div>
            </div>
        </div>

    </div> <!-- CONTAINER -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/function.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            // document.getElementById("ndivPotentialVotes").hide();
            $("#ndivPotentialVotes").hide();

            $("form").on("submit", function() {
                $("#enviar").prop("disabled", true);
            });

        });
    </script>
@endsection
