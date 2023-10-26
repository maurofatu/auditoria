function searchLocation(e, f) {
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
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchTable(e, f) {
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
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchImg(e, f) {
    var dimtable = e.target.value;
    var election = f.election.value;

    $("#mesvotimg").val(dimtable);

    if (dimtable == "") {
        return false;
    }

    $.ajax({
        method: "GET",
        url: "/searchimg/" + dimtable + "/" + election,
        success: function (response) {
            $("#idimg").val(dimtable);

            if (response["count_votes"]) {
                document.getElementById("ndivImgVotes").style.visibility =
                    "visible";
                $("#enviar").attr("disabled", true);
                $("#datoscargados").val("S");
                response["count_votes"].forEach((item) => {
                    $("#vote" + item["candidate"]).val(item["amount"]);
                    $("#vote" + item["candidate"]).prop("readonly", true);
                });
            } else {
                document.getElementById("ndivImgVotes").style.visibility =
                    "hidden";
                    $("#datoscargados").val("N");
                $("#enviar").attr("disabled", false);
                response["dat"].forEach((item) => {
                    $("#vote" + item).val("");
                    $("#vote" + item).prop("readonly", false);
                });
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal.fire({
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
            swal.fire({
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
            swal.fire({
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
            swal.fire({
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
            swal.fire({
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
            if (response["count"]) {
                $("#divPotentialVotes").hide(500);
                document.getElementById("potentialvotes").style.visibility =
                    "hidden";
                const myDiv = document.getElementById("ndivPotentialVotes");
                myDiv.innerHTML =
                    "<p>POTENCIAL VOTOS <br>" +
                    response["amount"]["0"]["amount"] +
                    "</p>";
                $("#ndivPotentialVotes").show();
                const data = response["countvotes"];
                const cvotes = document.getElementById("foreachcountvotes");

                cvotes.innerHTML = "";

                Object.entries(data).forEach(([key, value]) => {
                    var it = ++key;
                    cvotes.innerHTML +=
                        "<div  class='col-xl-2 col-4'>" +
                        it +
                        "</div><div class='col-xl-2 col-4'>" +
                        value["amount"] +
                        "</div><div class='col-xl-2 col-4'>" +
                        value["created_at"] +
                        "</div><hr>";
                });

                $("#foreachcountvotes").show();
            } else {
                $("#divPotentialVotes").show(500);
                let div = document.getElementById("potentialVot");
                $("#ndivPotentialVotes").hide();
                $("#foreachcountvotes").hide();
                div.innerHTML =
                    '<input class="form-control" type="number" name="potentialvotes" id="potentialvotes"  />';
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal.fire({
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

            let codeCity = "City";

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
            swal.fire({
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
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchLocationCountVotesDash(e) {
    var dimlocation = e.target.value;

    if (dimlocation == "") {
        return false;
    }
    const lugar = $("#lugvot");
    const mesa = $("#mesvot");
    $.ajax({
        method: "GET",
        url: "/searchlocationcountvotesdash/" + dimlocation,
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
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchDataCountVotesDash(e) {
    var dimlocation = e.target.value;

    $.ajax({
        method: "GET",
        url: "/searchcountvotesdash/" + dimlocation,
        success: function (response) {
            if (response) {
                let range1 = 0;
                let range2 = 0;
                let range3 = 0;
                let range4 = 0;
                let range5 = 0;

                let potential = response["potential"][0]["potential"];

                document.getElementById("tablesinstaller").innerHTML =
                    response["cantable"][0]["cant"];
                document.getElementById("potential").innerHTML = potential;

                response["cvotesdash"].forEach((item) => {
                    if (item.hora <= 9) range1 += item.hora;
                    if (item.hora <= 10) range2 += item.hora;
                    if (item.hora <= 12) range3 += item.hora;
                    if (item.hora <= 14) range4 += item.hora;
                    range5 += item.hora;
                });

                document.getElementById("range1").innerHTML = range1;
                document.getElementById("range2").innerHTML = range2;
                document.getElementById("range3").innerHTML = range3;
                document.getElementById("range4").innerHTML = range4;
                document.getElementById("range5").innerHTML = range5;

                let pernumbervotes = Math.round((range5 * 100) / potential);
                let abstention = potential - range5;
                let perabstention = Math.round((abstention * 100) / potential);

                document.getElementById("numbervotes").innerHTML = range5;
                document.getElementById("pernumbervotes").innerHTML =
                    pernumbervotes + "%";
                document.getElementById("abstention").innerHTML = abstention;
                document.getElementById("perabstention").innerHTML =
                    perabstention + "%";

                graphicscountvotes(range1, range2, range3, range4, range5);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

// ---- FUNCTIONS GOBERNACION DASH

function searchLocationGobernacionDash(e) {
    var dimlocation = e.target.value;

    searchDataGobernacionFDash(dimlocation);

    if (dimlocation == "") {
        return false;
    }
    const lugar = $("#lugvotdashgo");
    const mesa = $("#mesvotdashgo");
    $.ajax({
        method: "GET",
        url: "/searchlocationcountvotesdash/" + dimlocation,
        success: function (response) {
            $("#lugvotdashgo")
                .empty()
                .append('<option value="" selected>Seleccione...</option>');
            $("#mesvotdashgo")
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
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchDataGobernacionDash(e) {
    var dimlocation = e.target.value;

    $.ajax({
        method: "GET",
        url: "/searchgobernaciondash/" + dimlocation,
        success: function (response) {
            if (response) {
                let candidate = [];

                for (let i = 0; i < 4; i++) {
                    candidate[i] = {
                        name: response["gobvotedash"][i]["name"],
                        amount: response["gobvotedash"][i]["amount"],
                    };
                }

                graphicsgobernacion(candidate);

                htmlTags = "";
                htmlTagsdata = "";
                var i = 0;
                var totvotgober = 0;

                response["gobvotedash"].forEach((item) => {
                    totvotgober += parseInt(item.amount);

                    if (i > 3 && item.id <= 27) {
                        htmlTags +=
                            "<tr>" +
                            "<td>" +
                            item.name +
                            "</td>" +
                            "<td>" +
                            item.amount +
                            "</td>" +
                            "</tr>";
                    }

                    if (item.id >= 28) {
                        htmlTagsdata += "<tr><td>" + item.name + "</td><td>" + item.amount + "</td>";
                    }
                    i++;
                });

                $("#tablegober tbody").empty();
                $("#tablegober tbody").append(htmlTags);
                $("#tablegobervote tbody").empty();
                $("#tablegobervote tbody").append(htmlTagsdata);

                let potential = response["potential"][0]["potential"];

                let abstention = potential - totvotgober;

                document.getElementById("potentialvotegober").innerHTML =
                    potential;
                document.getElementById("totalvotesgober").innerHTML =
                    totvotgober;
                document.getElementById("abstentiongober").innerHTML =
                    abstention;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchDataGobernacionFDash(e) {
    if (e == "") {
        return false;
    }

    $.ajax({
        method: "GET",
        url: "/searchgobernacionfdash/" + e,
        success: function (response) {
            if (response) {
                let candidate = [];

                for (let i = 0; i < 4; i++) {
                    candidate[i] = {
                        name: response["gobvotedash"][i]["name"],
                        amount: response["gobvotedash"][i]["amount"],
                    };
                }

                graphicsgobernacion(candidate);

                htmlTags = "";
                htmlTagsdata = "";
                var i = 0;
                var totvotgober = 0;

                response["gobvotedash"].forEach((item) => {
                    totvotgober += parseInt(item.amount);

                    if (i > 3 && item.id <= 27) {
                        htmlTags +=
                            "<tr>" +
                            "<td>" +
                            item.name +
                            "</td>" +
                            "<td>" +
                            item.amount +
                            "</td>" +
                            "</tr>";
                    }

                    if (item.id >= 28) {
                        htmlTagsdata += "<tr><td>" + item.name + "</td><td>" + item.amount + "</td>";
                    }
                    i++;
                });

                $("#tablegober tbody").empty();
                $("#tablegober tbody").append(htmlTags);
                $("#tablegobervote tbody").empty();
                $("#tablegobervote tbody").append(htmlTagsdata);

                let potential = response["potential"][0]["potential"];

                let abstention = potential - totvotgober;

                document.getElementById("potentialvotegober").innerHTML =
                    potential;
                document.getElementById("totalvotesgober").innerHTML =
                    totvotgober;
                document.getElementById("abstentiongober").innerHTML =
                    abstention;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchLocationAlcaldiaDash() {
    const lugar = $("#lugvotdashal");
    const mesa = $("#mesvotdashal");
    $.ajax({
        method: "GET",
        url: "/searchlocationcountvotesdash/1",
        success: function (response) {
            $("#lugvotdashal")
                .empty()
                .append('<option value="" selected>Seleccione...</option>');
            $("#mesvotdashal")
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
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchDataAlcaldiaDash(e) {
    var dimlocation = e.target.value;

    $.ajax({
        method: "GET",
        url: "/searchalcaldiadash/" + dimlocation,
        success: function (response) {
            if (response) {
                let candidate = [];

                for (let i = 0; i < 4; i++) {
                    candidate[i] = {
                        name: response["alcvotedash"][i]["name"],
                        amount: response["alcvotedash"][i]["amount"],
                    };
                }

                graphicsalcaldia(candidate);

                htmlTags = "";
                htmlTagsdata = "";
                var i = 0;
                var totvotalcal = 0;

                response["alcvotedash"].forEach((item) => {
                    totvotalcal += parseInt(item.amount);

                    if (i > 3 && item.id <= 13) {
                        htmlTags +=
                            "<tr>" +
                            "<td>" +
                            item.name +
                            "</td>" +
                            "<td>" +
                            item.amount +
                            "</td>" +
                            "</tr>";
                    }

                    if (item.id >= 14) {
                        htmlTagsdata += "<tr><td>" + item.name + "</td><td>" + item.amount + "</td>";
                    }
                    i++;
                });

                $("#tablealcal tbody").empty();
                $("#tablealcal tbody").append(htmlTags);
                $("#tablealcalvote tbody").empty();
                $("#tablealcalvote tbody").append(htmlTagsdata);

                let alcpotential = response["alcpotential"][0]["potential"];

                let alcabstention = alcpotential - totvotalcal;

                document.getElementById("potentialvotealcal").innerHTML =
                    alcpotential;
                document.getElementById("totalvotesalcal").innerHTML =
                    totvotalcal;
                document.getElementById("abstentionalcal").innerHTML =
                    alcabstention;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchDataAlcaldiaFDash() {
    $.ajax({
        method: "GET",
        url: "/searchalcaldiafdash/",
        success: function (response) {
            if (response) {
                let candidate = [];

                for (let i = 0; i < 4; i++) {
                    candidate[i] = {
                        name: response["alcvotedash"][i]["name"],
                        amount: response["alcvotedash"][i]["amount"],
                    };
                }

                graphicsalcaldia(candidate);

                htmlTags = "";
                htmlTagsdata = "";
                var i = 0;
                var totvotalcal = 0;

                response["alcvotedash"].forEach((item) => {
                    totvotalcal += parseInt(item.amount);

                    if (i > 3 && item.id <= 13) {
                        htmlTags +=
                            "<tr>" +
                            "<td>" +
                            item.name +
                            "</td>" +
                            "<td>" +
                            item.amount +
                            "</td>" +
                            "</tr>";
                    }

                    if (item.id >= 14) {
                        htmlTagsdata += "<tr><td>" + item.name + "</td><td>" + item.amount + "</td>";
                    }
                    i++;
                });

                $("#tablealcal tbody").empty();
                $("#tablealcal tbody").append(htmlTags);
                $("#tablealcalvote tbody").empty();
                $("#tablealcalvote tbody").append(htmlTagsdata);

                let alcpotential = response["alcpotential"][0]["potential"];

                let alcabstention = alcpotential - totvotalcal;

                document.getElementById("potentialvotealcal").innerHTML =
                    alcpotential;
                document.getElementById("totalvotesalcal").innerHTML =
                    totvotalcal;
                document.getElementById("abstentionalcal").innerHTML =
                    alcabstention;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchDataGobernacionDepDash() {
    $.ajax({
        method: "GET",
        url: "/searchgobernaciondepdash/",
        success: function (response) {
            if (response) {
                let candidate = [];

                for (let i = 0; i < 4; i++) {
                    candidate[i] = {
                        name: response["gobvotedash"][i]["name"],
                        amount: response["gobvotedash"][i]["amount"],
                    };
                }

                graphicsgobernacion(candidate);

                htmlTags = "";
                htmlTagsdata = "";
                var i = 0;
                var totvotgober = 0;

                response["gobvotedash"].forEach((item) => {
                    totvotgober += parseInt(item.amount);

                    if (i > 3 && item.id <= 27) {
                        htmlTags +=
                            "<tr>" +
                            "<td>" +
                            item.name +
                            "</td>" +
                            "<td>" +
                            item.amount +
                            "</td>" +
                            "</tr>";
                    }

                    if (item.id >= 28) {
                        htmlTagsdata += "<tr><td>" + item.name + "</td><td>" + item.amount + "</td>";
                    }
                    i++;
                });

                $("#tablegober tbody").empty();
                $("#tablegober tbody").append(htmlTags);
                $("#tablegobervote tbody").empty();
                $("#tablegobervote tbody").append(htmlTagsdata);

                let potential = response["potential"][0]["potential"];

                let abstention = potential - totvotgober;

                document.getElementById("potentialvotegober").innerHTML =
                    potential;
                document.getElementById("totalvotesgober").innerHTML =
                    totvotgober;
                document.getElementById("abstentiongober").innerHTML =
                    abstention;
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

function searchNews(e) {
    var fact_polling_stations = e.target.value;
    var token = $('input[name="_token"]').val();
    if (fact_polling_stations == "") {
        return false;
    }
    // const mesa = $("#mesvotfcv");
    $.ajax({
        method: "POST",
        url: "/news/find",
        data:{ fact_polling_stations: fact_polling_stations, _token: token },
        success: function (response) {
            const cuerpoTabla = $('#cuerpo_tabla_novedades');

            // Limpiar la tabla
            cuerpoTabla.empty();

            // Rellenar la tabla con los datos del objeto
            $.each(response, function (index, dato) {
                const fila = $('<tr>');

                for (const propiedad in dato) {
                    const celda = $('<td>').text(dato[propiedad]);
                    fila.append(celda);
                }

                cuerpoTabla.append(fila);
            });
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            swal.fire({
                title: XMLHttpRequest.statusText,
                text: XMLHttpRequest.responseJSON.message,
                icon: "error",
            });
        },
    });
}

// -------------------
