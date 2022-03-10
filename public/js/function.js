function searchLocation(e) {
    var dimlocation = e.target.value;

    if (dimlocation == "") {
        return false;
    }
    const lugar = $("#lugvot");
    const mesa = $("#mesvot")
    $.ajax({
        method: "GET",
        url: "/searchlocation/" + dimlocation,
        success: function (response) {

            $("#lugvot").empty().append('<option value="" selected>Seleccione...</option>');
            $("#mesvot").empty().append('<option value="" selected>Seleccione...</option>');

            response.forEach((item) => {
                lugar.append(
                    '<option value=" ' + item.value + ' "> ' + item.label  + '  </option>  '
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

            $("#mesvot").empty().append('<option value="" selected>Seleccione...</option>');

            response.forEach((item) => {
                mesa.append(
                    '<option value=" ' + item.value + ' "> ' + item.label  + '  </option>  '
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
                document.getElementById("span10" + item.candidate).innerHTML = countvote + " Votos";
                
            });

            graphics(l101,l102,l103);


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
    const mesa = $("#mesvotfcv")
    $.ajax({
        method: "GET",
        url: "/searchlocationfcv/" + dimlocation,
        success: function (response) {

            $("#lugvotfcv").empty().append('<option value="" selected>Seleccione...</option>');
            $("#mesvotfcv").empty().append('<option value="" selected>Seleccione...</option>');

            response.forEach((item) => {
                lugar.append(
                    '<option value=" ' + item.value + ' "> ' + item.label  + '  </option>  '
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

            $("#mesvotfcv").empty().append('<option value="" selected>Seleccione...</option>');

            response.forEach((item) => {
                mesa.append(
                    '<option value=" ' + item.value + ' "> ' + item.label  + '  </option>  '
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

