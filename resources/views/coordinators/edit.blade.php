@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-sm-12 mb-xl-0 mb-2">
                <div class="card" style="background-color: #0CA789;color:white;">
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
                <h4>Monitoreo Novedades - Coordinador de Puesto</h4>
            </div>
            <div class="col-12 mt-2">
                <h5>Municipio: {{ $data['fact_permits']->factPollingStation->dimCity->description }}</h5>
                <h5>Puesto: {{ $data['fact_permits']->factPollingStation->dimLocation->description }}</h5>
            </div>
        </div>
        <hr class="mt-0" />
        <div class="row">
            <div class="col-12 mt-2">
                <h5>Hora: {{ $data['fact_new']->created_at->format('H:m:s') }}</h5>
                <h5>Mesa: {{ $data['fact_new']->factPollingStation->dimTable->description }}</h5>
            </div>
        </div>
        <hr class="mt-0" />

        <form action="{{ route('coordinators.update', $data['fact_new']->id) }}" method="POST" name="news_update">
            @method('PUT')
            @csrf
            <div class="row justify-content-center">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-2" style="align-self: center;text-align: right;">
                        <div class="form-group">
                            <label for="countvotes">Descripción del suceso o situación a reportar:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <textarea class="form-control" disabled name="description_event" id="description_event" rows="4" cols="50"
                                placeholder="Escribe tu novedad aquí">{{ $data['fact_new']->description_event }}</textarea>
                            @error('description_event')
                                <small style="color: #FF0000"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-2" style="align-self: center;text-align: right;">
                        <div class="form-group">
                            <label for="countvotes">Descripción de la gestión y nuevo estado:</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <textarea class="form-control" name="management_description" id="management_description" rows="4" cols="50"
                                placeholder="Escribe tu novedad aquí">{{ $data['fact_new']->management_description }}</textarea>
                            @error('management_description')
                                <small style="color: #FF0000"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-2" style="align-self: center;text-align: right;">
                        <div class="form-group">
                            <label for="countvotes">Estado Novedad</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control js-example-basic-single2" id="status" name="status"
                                onchange="" required>
                                <option value="" disabled>Seleccione...</option>
                                @foreach ($data['dim_status'] as $status)
                                    <option {{ $data['fact_new']->status == $status['value'] ? 'selected disabled' : '' }}
                                        value="{{ $status['value'] }}"> {{ $status['label'] }} </option>
                                @endforeach
                            </select>

                            @error('status')
                                <small style="color: #FF0000"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 text-center">
                    <input type="submit" class="btn btn-outline-success" id="enviar" name="enviar"
                        value="Actualizar Estado">
                </div>
            </div>
        </form>

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
