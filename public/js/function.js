function searchLocation(e,f) {
    var dimlocation = e.target.value;
    var election = f.election.value;
    if (dimlocation == "") {
        return false;
    }
    const lugar = $("#lugvot");
    const mesa = $("#mesvot");
    $.ajax({
        method: "GET",
        url: "/searchlocation/" + dimlocation + "/" + election,
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

function searchTable(e,f) {
    var dimtable = e.target.value;
    var election = f.election.value;

    if (dimtable == "") {
        return false;
    }
    const mesa = $("#mesvot");
    
    $.ajax({
        method: "GET",
        url: "/searchtable/" + dimtable + "/" + election,
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

            if (response['count']) {
                $("#divPotentialVotes").hide(500);
                document.getElementById("potentialvotes").remove();
                const myDiv = document.getElementById("ndivPotentialVotes");
                myDiv.innerHTML = "<p>POTENCIAL VOTOS <br>"+ response['amount']['0']['amount'] +"</p>";
                $("#ndivPotentialVotes").show();
                const data = response['countvotes'];
                const cvotes = document.getElementById("foreachcountvotes");

                cvotes.innerHTML = "";
                
                Object.entries(data).forEach(([key, value]) => {
                    console.log(value['amount'])
                    console.log(value['created_at'])
                    cvotes.innerHTML += "<div class='col-3'>"+ value['amount'] +"</div><div class='col-7'>"+ value['created_at'] +"</div>";  
                  });
                
                
                $("#foreachcountvotes").show();
            } else {
                $("#divPotentialVotes").show(500);
                let div = document.getElementById("potentialVot");
                $("#ndivPotentialVotes").hide();
                $("#foreachcountvotes").hide();
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

            let codeCity = 'City';

            //Recorremos el arreglo
            response.forEach((x) => {
                //Creamos un nuevo objeto donde vamos a almacenar por ciudades.

                if (codeCity != x.city) {

                            $("#count").append(
                        '<div class="col-md-8 mt-3"><h3> ' +
                            x.city +
                            ' </h3></div><div class="col-md-2"></div><div class="col-md-2" "></div>'
                    );
                    codeCity = x.city;
                    
                    
                }

                $("#count").append(
                    '<div class="col-md-8"><h5> ' +
                        x.location +
                        ' </h5></div><div class="col-md-2" id="potent' +
                        x.mesa +
                        '"></div><div class="col-md-2"><h5>' +
                        x.mesa +
                        " </h5></div>"
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

function potentialVoters(id) {
    // console.log(id);
    $.ajax({
        method: "GET",
        url: "/potentialvotersrequest/" + id,
        success: function (response) {
            // console.log(response);
            let div = document.getElementById("potent" + id);
            div.innerHTML =
                '<h5 id="potent' + id + '">PV: ' + response.cant + " </h5>";
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
