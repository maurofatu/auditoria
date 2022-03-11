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

function returnDataCity(city, candidate){
    return (city&&city[candidate])?city[candidate].votes:0;
}

function graphicscities(response) {
    
    $("#graphicCities").html('<canvas id="graficaciudades"></canvas>');
    // Obtener una referencia al elemento canvas del DOM
    const $graficaciudades = document.querySelector("#graficaciudades");

    //Creamos un nuevo objeto donde vamos a almacenar por ciudades. 
    let nuevoObjeto = {}
    //Recorremos el arreglo 
    response.forEach( x => {
    //Si la ciudad no existe en nuevoObjeto entonces
    //la creamos e inicializamos el arreglo de profesionales. 
    if( !nuevoObjeto.hasOwnProperty(x.city)){
        nuevoObjeto[x.city] = []
    }
    
    //Agregamos los datos de profesionales. 
        nuevoObjeto[x.city].push({
        candidate: x.candidate,
        votes: x.votes
        })
    
    })

    for(i=1;i<=7;i++){
        let l101 = returnDataCity(nuevoObjeto[i], 0);
        document.getElementById(i + "l101").innerHTML = l101;
        let l102 = returnDataCity(nuevoObjeto[i], 1);
        document.getElementById(i + "l102").innerHTML = l102;
        let l103 = returnDataCity(nuevoObjeto[i], 2);
        document.getElementById(i + "l103").innerHTML = l103;
    }

    // Las etiquetas son las que van en el eje X.
    const etiquetas = ["Arauca","Arauquita","Cravo Norte","Fortul","Puerto Rondon","Saravena","Tame"];
    // Podemos tener varios conjuntos de datos. Comencemos con uno
    const b101 = {
        label: "L101",
        data: [
            returnDataCity(nuevoObjeto[1], 0),
            returnDataCity(nuevoObjeto[2], 0),
            returnDataCity(nuevoObjeto[3], 0),
            returnDataCity(nuevoObjeto[4], 0),
            returnDataCity(nuevoObjeto[5], 0),
            returnDataCity(nuevoObjeto[6], 0),
            returnDataCity(nuevoObjeto[7], 0),
        ], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: [
            "rgba(105, 192, 192, 0.2)",
            "rgba(105, 192, 192, 0.2)",
            "rgba(105, 192, 192, 0.2)",
            "rgba(105, 192, 192, 0.2)",
            "rgba(105, 192, 192, 0.2)",
            "rgba(105, 192, 192, 0.2)",
            "rgba(105, 192, 192, 0.2)",
        ], // Color de fondo
        borderColor: [
            "rgba(105, 192, 192, 1)",
            "rgba(105, 192, 192, 1)",
            "rgba(105, 192, 192, 1)",
            "rgba(105, 192, 192, 1)",
            "rgba(105, 192, 192, 1)",
            "rgba(105, 192, 192, 1)",
            "rgba(105, 192, 192, 1)",
        ], // Color del borde
        borderWidth: 3, // Ancho del borde
    };
    const b102 = {
        label: "L102",
        data: [
            returnDataCity(nuevoObjeto[1], 1),
            returnDataCity(nuevoObjeto[2], 1),
            returnDataCity(nuevoObjeto[3], 1),
            returnDataCity(nuevoObjeto[4], 1),
            returnDataCity(nuevoObjeto[5], 1),
            returnDataCity(nuevoObjeto[6], 1),
            returnDataCity(nuevoObjeto[7], 1),
        ], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: [
            "rgba(255, 99, 103, 0.2)",
            "rgba(255, 99, 103, 0.2)",
            "rgba(255, 99, 103, 0.2)",
            "rgba(255, 99, 103, 0.2)",
            "rgba(255, 99, 103, 0.2)",
            "rgba(255, 99, 103, 0.2)",
            "rgba(255, 99, 103, 0.2)",
        ], // Color de fondo
        borderColor: [
            "rgba(255, 99, 103, 1)",
            "rgba(255, 99, 103, 1)",
            "rgba(255, 99, 103, 1)",
            "rgba(255, 99, 103, 1)",
            "rgba(255, 99, 103, 1)",
            "rgba(255, 99, 103, 1)",
            "rgba(255, 99, 103, 1)",
        ], // Color del borde
        borderWidth: 3, // Ancho del borde
    };
    const b103 = {
        label: "L103",
        data: [
            returnDataCity(nuevoObjeto[1], 2),
            returnDataCity(nuevoObjeto[2], 2),
            returnDataCity(nuevoObjeto[3], 2),
            returnDataCity(nuevoObjeto[4], 2),
            returnDataCity(nuevoObjeto[5], 2),
            returnDataCity(nuevoObjeto[6], 2),
            returnDataCity(nuevoObjeto[7], 2),
        ], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: [
            "rgba(54, 162, 235, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(54, 162, 235, 0.2)",
        ], // Color de fondo
        borderColor: [
            "rgba(54, 162, 235, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(54, 162, 235, 1)",
        ], // Color del borde
        borderWidth: 3, // Ancho del borde
    };
    new Chart($graficaciudades, {
        type: "bar", // Tipo de gráfica
        data: {
            labels: etiquetas,
            datasets: [b101,b102,b103],
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
                display: true,
            },
            animation: {
                duration: 0,
            },
        },
    });
}
