<div class="col-md-12">
    <div class="card">
        <div class="card-header text-center">
            <h2><b>{{ __('Resultados Alcaldia') }}</b></h2>
        </div>

    </div>
</div>

<div class="row justify-content-center mb-4">
    <div class="col-md-3 mt-2">
        <div class="form-group">
            <label for="lugvotdashal">Lugar Votación</label>
            <select class="form-control js-example-basic-single" id="lugvotdashal" name="lugvotdashal"
                onchange="searchDataAlcaldiaDash(event)" required>
                <option value="" selected>Seleccione...</option>
            </select>
            @error('lugvotdashal')
                <small style="color: #FF0000"> {{ $message }} </small>
            @enderror
        </div>
    </div>
</div>

<div class="row  mb-4">

    <div class="col-6" id="graphicalcaldia"></div>

    <div class="col-3">
        <h4>Otros candidatos</h4>
        <table class="table table-bordered" id="tablealcal" name="tablealcal">
            <tbody id="tbodyalcal">

            </tbody>
        </table>
    </div>

    <div class="col-3">
        <h4>Datos Votos</h4>
        <table class="table table-bordered" id="tablealcalvote" name="tablealcalvote">
            <tbody id="tbodyalcalvote">

            </tbody>
        </table>
    </div>
</div>

<div class="row  mb-4">

    <div class="col-6">
        <div class="row">
            <div class="col-2">Total Potencial</div>
            <div id="potentialvotealcal" class="col-1"></div>

            <div class="col-2">Total Votos</div>
            <div id="totalvotesalcal"class="col-1"></div>

            <div class="col-2">Abstencion</div>
            <div id="abstentionalcal"class="col-1" style="color: red;"></div>
        </div>
    </div>


</div>
