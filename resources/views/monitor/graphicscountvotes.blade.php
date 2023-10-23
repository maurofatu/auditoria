<div class="col-md-12">
    <div class="card">
        <div class="card-header text-center">
            <h2><b>{{ __('Cuenta Votos') }}</b></h2>
        </div>

    </div>
</div>

<div class="row justify-content-center mb-4">
    <div class="col-md-3 mt-2">
        <div class="form-group">
            <label for="munvot">Municipio Votación</label>
            <select class="form-control js-example-basic-single" id="munvot" name="munvot"
                onchange="searchLocationCountVotesDash(event)" required>
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
                onchange="searchDataCountVotesDash(event)" required>
                <option value="" selected>Seleccione...</option>
            </select>
            @error('lugvot')
                <small style="color: #FF0000"> {{ $message }} </small>
            @enderror
        </div>
    </div>
</div>

<div class="row justify-content-center mb-4">
    <div class="col-3 justify-content-center">
        <p class="text-center">
        <h4>Mesas Instaladas</h4>
        <h6 id="tablesinstaller"></h6>
        </p>
    </div>
    <div class="col-3 justify-content-center">
        <p class="text-center">
        <h4>Potencial</h4>
        <h6 id="potential"></h6>
        </p>
    </div>
</div>

<div class="row  mb-4">

    <div class="col-3">
        <h4>Reportes Acumulados</h4>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>9:00 a.m</td>
                    <td id="range1"></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>10:00</td>
                    <td id="range2"></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>12:00</td>
                    <td id="range3"></td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>2:00</td>
                    <td id="range4"></td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>3:45</td>
                    <td id="range5"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-3">
        <h4>Comportamiento</h4>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>No. Votantes</td>
                    <td id="numbervotes"></td>
                </tr>
                <tr>
                    <td>Porcentaje %</td>
                    <td id="pernumbervotes"></td>
                </tr>
                <tr>
                    <td>Abstención</td>
                    <td id="abstention"></td>
                </tr>
                <tr>
                    <td>% Abstencion</td>
                    <td id="perabstention"></td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="col-6" id="graphiccountvotes"></div>

</div>
