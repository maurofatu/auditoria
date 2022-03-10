function graphics(l101, l102, l103) {
    
    $("#graphic").html('<canvas id="grafica"></canvas>');

    // Obtener una referencia al elemento canvas del DOM
    const $grafica = document.querySelector("#grafica");
    // Las etiquetas son las que van en el eje X.
    const etiquetas = ["L101", "L102", "L103"];
    // Podemos tener varios conjuntos de datos. Comencemos con uno
    const data = {
        label: "",
        data: [l101, l102, l103], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: [
            "rgba(105, 192, 192, 0.2)",
            "rgba(255, 99, 103, 0.2)",
            "rgba(54, 162, 235, 0.2)",
        ], // Color de fondo
        borderColor: [
            "rgba(75, 192, 192, 1)",
            "rgba(255, 99, 103, 1)",
            "rgba(54, 162, 235, 1)",
        ], // Color del borde
        borderWidth: 3, // Ancho del borde
    };
    new Chart($grafica, {
        type: "bar", // Tipo de gráfica
        data: {
            labels: etiquetas,
            datasets: [data],
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true,
                        },
                    },
                ],
            },
            legend: {
                display: false,
            },
            animation: {
                duration: 0,
            },
        },
    });
}

function graphicscities(response) {
    
    $("#graphicCities").html('<canvas id="graficaciudades"></canvas>');
    // Obtener una referencia al elemento canvas del DOM
    const $graficaciudades = document.querySelector("#graficaciudades");
    
    console.log(response);

    return;
    
    // Las etiquetas son las que van en el eje X.
    const etiquetas = ["L101", "L102", "L103"];
    // Podemos tener varios conjuntos de datos. Comencemos con uno
    const data = {
        label: "",
        data: [l101, l102, l103], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: [
            "rgba(105, 192, 192, 0.2)",
            "rgba(255, 99, 103, 0.2)",
            "rgba(54, 162, 235, 0.2)",
        ], // Color de fondo
        borderColor: [
            "rgba(75, 192, 192, 1)",
            "rgba(255, 99, 103, 1)",
            "rgba(54, 162, 235, 1)",
        ], // Color del borde
        borderWidth: 3, // Ancho del borde
    };
    new Chart($graficaciudades, {
        type: "bar", // Tipo de gráfica
        data: {
            labels: etiquetas,
            datasets: [data],
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true,
                        },
                    },
                ],
            },
            legend: {
                display: false,
            },
            animation: {
                duration: 0,
            },
        },
    });
}
