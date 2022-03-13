function searchLocation(e) {
    var dimlocation = e.target.value;

    if (dimlocation == "") {
        return false;
    }
    const lugar = $("#lugvot");
    const mesa = $("#mesvot");
    $.ajax({
        method: "GET",
        url: "/searchlocation/" + dimlocation,
        success: function (response) {
            $("#lugvot")
                .empty()
                .append('<option value="" selected>Seleccione...</option>');
            $("#mesvot")
                .empty()
                .append('<option value="" selected>Seleccione...</option>');

            response.forEach((item) => {
                lugar.append(
                    '<option value=" ' +
                        item.value +
                        ' "> ' +
                        item.label +
                        "  </option>  "
                );
            });
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchTable(e) {
    var dimtable = e.target.value;

    if (dimtable == "") {
        return false;
    }
    const mesa = $("#mesvot");
    $.ajax({
        method: "GET",
        url: "/searchtable/" + dimtable,
        success: function (response) {
            $("#mesvot")
                .empty()
                .append('<option value="" selected>Seleccione...</option>');

            response.forEach((item) => {
                mesa.append(
                    '<option value=" ' +
                        item.value +
                        ' "> ' +
                        item.label +
                        "  </option>  "
                );
            });
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchVotes() {
    $.ajax({
        method: "GET",
        url: "/searchvotes/",
        success: function (response) {
            let l101 = response[0].votes === null ? 0 : response[0].votes;
            let l102 = response[1].votes === null ? 0 : response[1].votes;
            let l103 = response[2].votes === null ? 0 : response[2].votes;
            response.forEach((item) => {
                let countvote = item.votes === null ? 0 : item.votes;
                document.getElementById("span10" + item.candidate).innerHTML =
                    countvote + " Votos";
            });

            graphics(l101, l102, l103);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

// FUNCTION FOR COUNT VOTES

function searchLocationFcv(e) {
    var dimlocation = e.target.value;

    if (dimlocation == "") {
        return false;
    }
    const lugar = $("#lugvotfcv");
    const mesa = $("#mesvotfcv");
    $.ajax({
        method: "GET",
        url: "/searchlocationfcv/" + dimlocation,
        success: function (response) {
            $("#lugvotfcv")
                .empty()
                .append('<option value="" selected>Seleccione...</option>');
            $("#mesvotfcv")
                .empty()
                .append('<option value="" selected>Seleccione...</option>');

            response.forEach((item) => {
                lugar.append(
                    '<option value=" ' +
                        item.value +
                        ' "> ' +
                        item.label +
                        "  </option>  "
                );
            });
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchTableFcv(e) {
    var dimtable = e.target.value;

    if (dimtable == "") {
        return false;
    }
    const mesa = $("#mesvotfcv");
    $.ajax({
        method: "GET",
        url: "/searchtablefcv/" + dimtable,
        success: function (response) {
            $("#mesvotfcv")
                .empty()
                .append('<option value="" selected>Seleccione...</option>');

            response.forEach((item) => {
                mesa.append(
                    '<option value=" ' +
                        item.value +
                        ' "> ' +
                        item.label +
                        "  </option>  "
                );
            });
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function citiesVotes() {
    $.ajax({
        method: "GET",
        url: "/citiesrequest/",
        success: function (response) {
            graphicscities(response);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchPotential(e) {
    let mesvot = e.target.value;
    $.ajax({
        method: "GET",
        url: "/searchpotential/" + mesvot,
        success: function (response) {
            console.log(response);

            if (response) {
                $("#divPotentialVotes").hide(500);
                document.getElementById("potentialvotes").remove();
            } else {
                $("#divPotentialVotes").show(500);
                let div = document.getElementById("potentialVot");
                div.innerHTML =
                    '<input class="form-control" type="number" name="potentialvotes" id="potentialvotes" required />';
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function countVotesRequest() {
    $.ajax({
        method: "GET",
        url: "/countvotesrequest/",
        success: function (response) {
            // console.log(response);
            // return;

            //Recorremos el arreglo
            response.forEach((x) => {
                //Creamos un nuevo objeto donde vamos a almacenar por ciudades.
                // let nuevoObjeto = {};

                //     //Si la ciudad no existe en nuevoObjeto entonces
                //     //la creamos e inicializamos el arreglo de profesionales.
                //     if (!nuevoObjeto.hasOwnProperty(x.idCity)) {
                //         nuevoObjeto[x.idCity] = [];
                //     }

                //     //Agregamos los datos de profesionales.
                //     nuevoObjeto[x.idCity].push({
                //         idcity: x.idCity,
                //         city: x.city,
                //         location: x.location,
                //         idlocation: x.idLocation,
                //         cant: x.cant,
                //     });

                // for (let i = 1; i <= 7; i++) {

                //     console.log(nuevoObjeto[i]);

                //     if (nuevoObjeto[i]) {
                //         // console.log(nuevoObjeto);
                //         let div = document.getElementById(i);
                //         div.innerHTML =
                //             '<h2 class="text-center mt-3"> ' +
                //             nuevoObjeto[i][0].city +
                //             " </h2>";

                //         for (let j = 0; j < nuevoObjeto[i].length; j++) {
                //             // console.log(nuevoObjeto[i][j].idlocation);

                //             let potent = potentialVoters(
                //                 nuevoObjeto[i][j].idlocation
                //             );

                //             // console.log(potent);
                //             div.innerHTML =
                //                 '<div class="col-md-4"><h3> ' +
                //                 nuevoObjeto[i][j].city +
                //                 " </h3><h5> " +
                //                 nuevoObjeto[i][j].location +
                //                 " </h5> <h5>Potencial Votantes: " +
                //                 potent +
                //                 " </h5><h5>Cuenta Votos: " +
                //                 nuevoObjeto[i][j].cant +
                //                 " </h5></div>";
                //         }
                //     }
                // }

                

                $('#count').append('<div class="col-md-4"><h3> ' +
                        x.city +
                        " </h3><h5> " +
                        x.location +
                        " </h5> <h5>Potencial Votantes: -- </h5><h5>Cuenta Votos: " +
                        x.cant +
                        " </h5></div>");
                
            });
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function potentialVoters(id) {
    // console.log(id);
    $.ajax({
        method: "GET",
        url: "/potentialvotersrequest/" + id,
        success: function (response) {
            // console.log(response);
            return response;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}
