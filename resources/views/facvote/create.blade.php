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

                            
                          <form action="#" method="POST" name="formulariol" id="formulariol">
                            @csrf
                
                           
                            <!-- Datos Votacion -->
                            <h3 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                              Datos
                            </h3>
                
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="munvot">Municipio Votación</label>
                                    <select class="form-control js-example-basic-single" id="munvot" name="munvot"
                                        onchange="searchLocation(event)" required>
                                        <option value="" selected>Seleccione...</option>
                                        @foreach ($data['dim_cities'] as $dim_city)
                                            <option value="{{ $dim_city->id }}"> {{ $dim_city->description }} </option>
                                        @endforeach
                                    </select>
                                    @error('munvot')
                                      <small style="color: #FF0000"> {{ $message }} </small>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="lugvot">Lugar Votación</label>
                                    <select class="form-control js-example-basic-single" id="lugvot" name="lugvot"
                                        onchange="searchTable(event)" required>
                                        <option value="" selected>Seleccione...</option>
                                        <option value="ARAUCA">ARAUCA</option>
                                        <option value="TAME">TAME</option>
                                        <option value="TAME">RTAME</option>
                                        <option value="TAME">XTAME</option>
                                        {{-- @foreach ($data['capitaneslist'] as $iitem)
                                            <option value="{{ $iitem->cedula }}"> {{ $iitem->nombres }} </option>
                                        @endforeach --}}
                                    </select>
                                    @error('lugvot')
                                      <small style="color: #FF0000"> {{ $message }} </small>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="cedula">Mesa de Votación</label>
                                    <select class="form-control js-example-basic-single" id="mesvot" name="mesvot"
                                        onchange="" required>
                                        <option value="" selected>Seleccione...</option>
                                        <option value="ARAUCA">ARAUCA</option>
                                        <option value="TAME">TAME</option>
                                        <option value="TAME">RTAME</option>
                                        <option value="TAME">XTAME</option>
                                        {{-- @foreach ($data['capitaneslist'] as $iitem)
                                            <option value="{{ $iitem->cedula }}"> {{ $iitem->nombres }} </option>
                                        @endforeach --}}
                                    </select>
                                    @error('mesvot')
                                      <small style="color: #FF0000"> {{ $message }} </small>
                                    @enderror
                                  </div>
                                </div>
                              </div>

                              <div class="row justify-content-center mt-3">
                                  
                                <div class="col-md-2" style="align-self: center;text-align: right;">
                                    <div class="form-group">
                                      <label for="nombre">L101</label>
                                    </div>
                                  </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <input class="form-control" type="number" name="l101" id="l101" required/>
                                      @error('l101')
                                        <small style="color: #FF0000"> {{ $message }} </small>
                                      @enderror
                                    </div>
                                  </div>
                              </div>

                              <div class="row justify-content-center mt-3">
                                <div class="col-md-2" style="align-self: center;text-align: right;">
                                    <div class="form-group">
                                        <label for="nombre">L102</label>
                                    </div>
                                  </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <input class="form-control" type="number" name="l101" id="l101" required/>
                                      @error('l101')
                                        <small style="color: #FF0000"> {{ $message }} </small>
                                      @enderror
                                    </div>
                                  </div>
                              </div>

                              <div class="row justify-content-center mt-3">
                                <div class="col-md-2" style="align-self: center;text-align: right;">
                                    <div class="form-group">
                                        <label for="nombre">L103</label>
                                    </div>
                                  </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <input class="form-control" type="number" name="l101" id="l101" required/>
                                      @error('l101')
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
