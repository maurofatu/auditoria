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

            <input type="hidden" name="election" id="election" value="{{ $id }}">
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
                            onchange="searchImg(event,this.form)" required>
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
                        <input type="number" class="form-control" id="vote{{ $item->id }}"
                            name="vote{{ $item->id }}" aria-describedby="vote" placeholder="#" pattern="[0-9]*"
                            inputmode="numeric" required>
                    </div>
                @endforeach

                <div class="col-md-12 mt-4 mb-4 text-center">

                    <input type="submit" class="btn btn-success" id="enviar" name="enviar" value="Enviar">

                </div>

            </div>


        </form>
        <input type="hidden" name="idimg" id="idimg">
        <div id="ndivImgVotes" class="row align-items-start align-items-center">
            <button id="btn-cargar" class="btn btn-outline-success btn-lg">
                Cargar Imagen E-14
            </button>
        </div>



    </div> <!-- CONTAINER -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/function.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            document.getElementById('ndivImgVotes').style.visibility = "hidden";

        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btn-cargar').addEventListener('click', function() {
                var mesvot = $("#idimg").val();

                Swal.fire({
                    title: 'Cargar archivo',
                    html: `
                <input type="file" id="archivo" accept="image/*" />
            `,
                    showCancelButton: true,
                    confirmButtonText: 'Cargar',
                    preConfirm: () => {
                        const inputFile = document.getElementById('archivo');
                        const formData = new FormData();
                        formData.append('archivo', inputFile.files[0]);
                        formData.append('mesvot', mesvot);

                        return fetch('{{ route('factvote.img') }}', {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire('Carga exitosa', data.message, 'success');
                                    document.getElementById("ndivImgVotes").style
                                        .visibility = "hidden";
                                    console.log(data.election);
                                    if (data.election == '1') {
                                        window.location.href =
                                            "{{ route('factvote.votes', 1) }}";
                                    } else {
                                        window.location.href =
                                            "{{ route('factvote.votes', 2) }}";
                                    }
                                } else {
                                    Swal.fire('Error', data.message, 'error');
                                }
                            });
                    }
                });
            });
        });
    </script>
@endsection
