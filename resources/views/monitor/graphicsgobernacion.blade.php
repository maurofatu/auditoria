<div class="col-md-12">
    <div class="card">
        <div class="card-header text-center">
            <h2><b>{{ __('Resultados Gobernacion') }}</b></h2>
        </div>

    </div>
</div>

<div class="row justify-content-center mb-4">
    <div class="col-md-3 mt-2">
        <div class="form-group">
            <label for="munvotdashgo">Municipio Votación</label>
            <select class="form-control js-example-basic-single" id="munvotdashgo" name="munvotdashgo"
                onchange="searchLocationGobernacionDash(event)" required>
                <option value="" selected>Seleccione...</option>
                @foreach ($data['dim_cities'] as $dim_city)
                    <option value="{{ $dim_city->value }}"> {{ $dim_city->label }} </option>
                @endforeach
            </select>
            @error('munvotdashgo')
                <small style="color: #FF0000"> {{ $message }} </small>
            @enderror
        </div>
    </div>
    <div class="col-md-3 mt-2">
        <div class="form-group">
            <label for="lugvotdashgo">Lugar Votación</label>
            <select class="form-control js-example-basic-single" id="lugvotdashgo" name="lugvotdashgo"
                onchange="searchDataGobernacionDash(event)" required>
                <option value="" selected>Seleccione...</option>
            </select>
            @error('lugvotdashgo')
                <small style="color: #FF0000"> {{ $message }} </small>
            @enderror
        </div>
    </div>
</div>

<div class="row  mb-4">

    <div class="col-6" id="graphicgobernacion"></div>

    <div class="col-3">
        <h4>Otros candidatos</h4>
        <table class="table table-bordered" id="tablegober" name="tablegober">
            <tbody id="tbodygober">
                
            </tbody>
        </table>
    </div>

    <div class="col-3">
        <h4>Datos Votos</h4>
        <table class="table table-bordered" id="tablegobervote" name="tablegobervote">
            <tbody id="tbodygobervote">
                
            </tbody>
        </table>
    </div>

    


</div>

<div class="row  mb-4">

    <div class="col-6">
        <div class="row">
            <div class="col-2">Total Potencial</div>
            <div id="potentialvotegober" class="col-2"></div>

            <div class="col-2">Total Votos</div>
            <div id="totalvotesgober"class="col-2"></div>

            <div class="col-2">Abstencion</div>
            <div id="abstentiongober"class="col-2" style="color: red;"></div>
        </div>
    </div>


</div>
