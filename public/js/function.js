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
            let l101 = response[0].votes;
            let l102 = response[1].votes;
            let l103 = response[2].votes;
            response.forEach((item) => {
                document.getElementById("span10" + item.candidate).innerHTML = item.votes + " Votos";
                
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
