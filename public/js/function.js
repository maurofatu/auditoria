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
