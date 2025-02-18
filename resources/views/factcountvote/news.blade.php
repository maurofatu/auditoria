@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-2">

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
            <h5>DE NOVEDADES</h5>
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
                    <form action="{{ route('factcountvote.storenews') }}" method="POST" name="factcountvote" id="factcountvote">
                        @csrf
                        <!-- Datos Votacion -->
                        <div class="row justify-content-center">
                            <div class="col-md-3 mt-2">
                                <div class="form-group">
                                    <label for="munvotfcv">Municipio Votación</label>
                                    <select class="form-control js-example-basic-single" id="munvotfcv" name="munvotfcv" onchange="searchLocationFcv(event)" required>
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
                                    <select class="form-control js-example-basic-single" id="lugvotfcv" name="lugvotfcv" onchange="searchTableFcv(event)" required>
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
                                    <select class="form-control js-example-basic-single" id="mesvotfcv" name="mesvotfcv" onchange="searchNews(event)" required>
                                        <option value="" selected>Seleccione...</option>
                                    </select>
                                    @error('mesvotfcv')
                                    <small style="color: #FF0000"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">

                            <div class="col-md-2" style="align-self: center;text-align: right;">
                                <div class="form-group">
                                    <label for="countvotes">Tipo Novedad</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control js-example-basic-single2" id="tipenews" name="tipenews" onchange="" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        @foreach ($data['dim_types_news'] as $dim_type_new)
                                        <option value="{{ $dim_type_new->id }}"> {{ $dim_type_new->description }} </option>
                                        @endforeach
                                    </select>

                                    @error('datanews')
                                    <small style="color: #FF0000"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-2" style="align-self: center;text-align: right;">
                                <div class="form-group">
                                    <label for="countvotes">Novedad</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <textarea class="form-control" name="datanews" id="datanews" rows="4" cols="50" placeholder="Escribe tu novedad aquí"></textarea>
                                    @error('datanews')
                                    <small style="color: #FF0000"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4 text-center">
                            <input type="submit" class="btn btn-outline-success" id="enviar" name="enviar" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3 ">
        <div class="card-body">
            <h5>NOVEDADES REGISTRADAS</h5>
            <hr class="mt-0" />
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Hora</th>
                    </tr>
                </thead>
                <tbody id="cuerpo_tabla_novedades">
                    <tr>
                        <th colspan="6">No hay datos</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div> <!-- CONTAINER -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/function.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('.js-example-basic-single2').select2();
        // document.getElementById("ndivPotentialVotes").hide();
        $("#ndivPotentialVotes").hide();

    });
</script>
@endsection