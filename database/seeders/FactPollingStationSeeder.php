<?php

namespace Database\Seeders;

use App\Models\FactPermit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FactPollingStation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FactPollingStationSeeder extends Seeder
{

    private $pollingStations = [
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "1",
        //     "puesto" => "COLEGIO SIMON BOLIVAR",
        //     "mesas" => "39",
        //     "id_comuna" => "1",
        //     "comuna" => "COMUNA 1 RAIMUNDO CISNEROS O."
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "2",
        //     "puesto" => "CONCENTRACION CAMILO TORRES",
        //     "mesas" => "22",
        //     "id_comuna" => "2",
        //     "comuna" => "COMUNA 2 JOSEFA CANELONES"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "3",
        //     "puesto" => "ESCUELA LOS LIBERTADORES",
        //     "mesas" => "7",
        //     "id_comuna" => "1",
        //     "comuna" => "COMUNA 1 RAIMUNDO CISNEROS O."
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "4",
        //     "puesto" => "ESCUELA JOSE MARIA CORDOBA",
        //     "mesas" => "4",
        //     "id_comuna" => "2",
        //     "comuna" => "COMUNA 2 JOSEFA CANELONES"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "5",
        //     "puesto" => "NORMAL MARIA INMACULADA",
        //     "mesas" => "24",
        //     "id_comuna" => "4",
        //     "comuna" => "COMUNA 4 JOSE LAURENCIO OSIO"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "6",
        //     "puesto" => "COLEGIO TEC. CRISTO REY",
        //     "mesas" => "36",
        //     "id_comuna" => "4",
        //     "comuna" => "COMUNA 4 JOSE LAURENCIO OSIO"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "7",
        //     "puesto" => "ESCUELA FLOR DE MI LLANO",
        //     "mesas" => "27",
        //     "id_comuna" => "5",
        //     "comuna" => "COMUNA 5 JUAN JOSE RONDON"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "8",
        //     "puesto" => "UNIDAD DE SALUD MENTAL ARAUCA",
        //     "mesas" => "1",
        //     "id_comuna" => "4",
        //     "comuna" => "COMUNA 4 JOSE LAURENCIO OSIO"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "9",
        //     "puesto" => "COLEGIO SANTANDER PRIMARIA",
        //     "mesas" => "22",
        //     "id_comuna" => "3",
        //     "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "10",
        //     "puesto" => "CONC.ESCOLAR LAS COROCORAS",
        //     "mesas" => "14",
        //     "id_comuna" => "3",
        //     "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "11",
        //     "puesto" => "CONC.ESCOLAR DIVINO NIÑO",
        //     "mesas" => "27",
        //     "id_comuna" => "3",
        //     "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "12",
        //     "puesto" => "COL TEC SANTA TERESITA",
        //     "mesas" => "12",
        //     "id_comuna" => "3",
        //     "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "13",
        //     "puesto" => "CARCEL",
        //     "mesas" => "1",
        //     "id_comuna" => "11",
        //     "comuna" => "SIN COMUNA"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "14",
        //     "puesto" => "CAÑAS BRAVAS",
        //     "mesas" => "2",
        //     "id_comuna" => "6",
        //     "comuna" => "CORREGIMIENTO CAÑAS BRAVAS"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "15",
        //     "puesto" => "MAPORILLAL",
        //     "mesas" => "1",
        //     "id_comuna" => "7",
        //     "comuna" => "CORREGIMIENTO MAPORILLAL"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "16",
        //     "puesto" => "SANTA BARBARA",
        //     "mesas" => "4",
        //     "id_comuna" => "8",
        //     "comuna" => "CORREGIMIENTO SANTA BARBARA"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "17",
        //     "puesto" => "CARACOL",
        //     "mesas" => "2",
        //     "id_comuna" => "9",
        //     "comuna" => "CORREGIMIENTO CARACOL"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "18",
        //     "puesto" => "TODOS LOS SANTOS",
        //     "mesas" => "3",
        //     "id_comuna" => "10",
        //     "comuna" => "CORREGIMIENTO TODOS LOS SANTOS"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "19",
        //     "puesto" => "LAS NUBES",
        //     "mesas" => "2",
        //     "id_comuna" => "10",
        //     "comuna" => "CORREGIMIENTO TODOS LOS SANTOS"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "20",
        //     "puesto" => "FELICIANO",
        //     "mesas" => "1",
        //     "id_comuna" => "9",
        //     "comuna" => "CORREGIMIENTO CARACOL"
        // ],
        // [
        //     "id_election" => "1",
        //     "id_municipio" => "1",
        //     "municipio" => "ARAUCA",
        //     "id_puesto" => "21",
        //     "puesto" => "CLARINETERO",
        //     "mesas" => "1",
        //     "id_comuna" => "8",
        //     "comuna" => "CORREGIMIENTO SANTA BARBARA"
        // ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "1",
            "puesto" => "COLEGIO SIMON BOLIVAR",
            "mesas" => "39",
            "id_comuna" => "1",
            "comuna" => "COMUNA 1 RAIMUNDO CISNEROS O."
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "2",
            "puesto" => "CONCENTRACION CAMILO TORRES",
            "mesas" => "22",
            "id_comuna" => "2",
            "comuna" => "COMUNA 2 JOSEFA CANELONES"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "3",
            "puesto" => "ESCUELA LOS LIBERTADORES",
            "mesas" => "7",
            "id_comuna" => "1",
            "comuna" => "COMUNA 1 RAIMUNDO CISNEROS O."
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "4",
            "puesto" => "ESCUELA JOSE MARIA CORDOBA",
            "mesas" => "4",
            "id_comuna" => "2",
            "comuna" => "COMUNA 2 JOSEFA CANELONES"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "5",
            "puesto" => "NORMAL MARIA INMACULADA",
            "mesas" => "24",
            "id_comuna" => "4",
            "comuna" => "COMUNA 4 JOSE LAURENCIO OSIO"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "6",
            "puesto" => "COLEGIO TEC. CRISTO REY",
            "mesas" => "36",
            "id_comuna" => "4",
            "comuna" => "COMUNA 4 JOSE LAURENCIO OSIO"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "7",
            "puesto" => "ESCUELA FLOR DE MI LLANO",
            "mesas" => "27",
            "id_comuna" => "5",
            "comuna" => "COMUNA 5 JUAN JOSE RONDON"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "8",
            "puesto" => "UNIDAD DE SALUD MENTAL ARAUCA",
            "mesas" => "1",
            "id_comuna" => "4",
            "comuna" => "COMUNA 4 JOSE LAURENCIO OSIO"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "9",
            "puesto" => "COLEGIO SANTANDER PRIMARIA",
            "mesas" => "22",
            "id_comuna" => "3",
            "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "10",
            "puesto" => "CONC.ESCOLAR LAS COROCORAS",
            "mesas" => "14",
            "id_comuna" => "3",
            "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "11",
            "puesto" => "CONC.ESCOLAR DIVINO NIÑO",
            "mesas" => "27",
            "id_comuna" => "3",
            "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "12",
            "puesto" => "COL TEC SANTA TERESITA",
            "mesas" => "12",
            "id_comuna" => "3",
            "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "13",
            "puesto" => "CARCEL",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "14",
            "puesto" => "CAÑAS BRAVAS",
            "mesas" => "2",
            "id_comuna" => "6",
            "comuna" => "CORREGIMIENTO CAÑAS BRAVAS"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "15",
            "puesto" => "MAPORILLAL",
            "mesas" => "1",
            "id_comuna" => "7",
            "comuna" => "CORREGIMIENTO MAPORILLAL"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "16",
            "puesto" => "SANTA BARBARA",
            "mesas" => "4",
            "id_comuna" => "8",
            "comuna" => "CORREGIMIENTO SANTA BARBARA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "17",
            "puesto" => "CARACOL",
            "mesas" => "2",
            "id_comuna" => "9",
            "comuna" => "CORREGIMIENTO CARACOL"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "18",
            "puesto" => "TODOS LOS SANTOS",
            "mesas" => "3",
            "id_comuna" => "10",
            "comuna" => "CORREGIMIENTO TODOS LOS SANTOS"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "19",
            "puesto" => "LAS NUBES",
            "mesas" => "2",
            "id_comuna" => "10",
            "comuna" => "CORREGIMIENTO TODOS LOS SANTOS"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "20",
            "puesto" => "FELICIANO",
            "mesas" => "1",
            "id_comuna" => "9",
            "comuna" => "CORREGIMIENTO CARACOL"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "21",
            "puesto" => "CLARINETERO",
            "mesas" => "1",
            "id_comuna" => "8",
            "comuna" => "CORREGIMIENTO SANTA BARBARA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "22",
            "puesto" => "COL. INST. ORIENTAL FEMENINO",
            "mesas" => "22",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "23",
            "puesto" => "ESCUELA SAN ANTONIO",
            "mesas" => "21",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "24",
            "puesto" => "COLISEO CUBIERTO LOS LIBERTADORES",
            "mesas" => "12",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "25",
            "puesto" => "COLEGIO FROILAN FARIAS",
            "mesas" => "19",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "26",
            "puesto" => "CIUDADELA UNIVERSITARIA",
            "mesas" => "13",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "27",
            "puesto" => "BETOYES",
            "mesas" => "4",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "28",
            "puesto" => "PUERTO GAITAN",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "29",
            "puesto" => "PUERTO SAN SALVADOR",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "30",
            "puesto" => "LA HOLANDA",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "31",
            "puesto" => "LA ARENOSA",
            "mesas" => "2",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "32",
            "puesto" => "LAS MALVINAS",
            "mesas" => "2",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "33",
            "puesto" => "PUERTO JORDAN",
            "mesas" => "11",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "34",
            "puesto" => "CACHAMA",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "35",
            "puesto" => "EL BOTALON",
            "mesas" => "7",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "36",
            "puesto" => "EL TABLON",
            "mesas" => "2",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "2",
            "municipio" => "TAME",
            "id_puesto" => "37",
            "puesto" => "CENTRO POBLADO  COROCITO",
            "mesas" => "2",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "38",
            "puesto" => "IE LICEO DEL LLANO",
            "mesas" => "17",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "39",
            "puesto" => "IE LICEO DEL LLANO SEDE SIMON BOLIVAR",
            "mesas" => "17",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "40",
            "puesto" => "IE GABRIEL GARCIA MARQUEZ SEC PRIMARIA",
            "mesas" => "16",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "41",
            "puesto" => "IE GABRIEL GARCIA MARQUEZ SEC SECUNDARIA",
            "mesas" => "16",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "42",
            "puesto" => "AGUACHICA",
            "mesas" => "6",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "43",
            "puesto" => "LA ESMERALDA",
            "mesas" => "11",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "44",
            "puesto" => "LA PAZ",
            "mesas" => "4",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "45",
            "puesto" => "REINERA",
            "mesas" => "4",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "46",
            "puesto" => "LA PESQUERA",
            "mesas" => "5",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "47",
            "puesto" => "BRISAS DEL CARANAL",
            "mesas" => "2",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "48",
            "puesto" => "RESGUARDO INDIGENA EL VIGIA",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "49",
            "puesto" => "RESGUARDO INDIGENA SAN JOSE DE LIPA",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "50",
            "puesto" => "RESGUARDO INDIGENA IGUANITOS",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "3",
            "municipio" => "ARAUQUITA",
            "id_puesto" => "51",
            "puesto" => "PANAMA DE ARAUCA",
            "mesas" => "10",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "4",
            "municipio" => "CRAVO NORTE",
            "id_puesto" => "52",
            "puesto" => "PUESTO CABECERA MUNICIPAL",
            "mesas" => "12",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "4",
            "municipio" => "CRAVO NORTE",
            "id_puesto" => "53",
            "puesto" => "RESGUARDO INDIGENA CANANAMA",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "5",
            "municipio" => "FORTUL",
            "id_puesto" => "54",
            "puesto" => "POLIDEPORTIVO MUNICIPAL",
            "mesas" => "19",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "5",
            "municipio" => "FORTUL",
            "id_puesto" => "55",
            "puesto" => "CONCENTRACION ALEJANDRO HUMBOLDT",
            "mesas" => "14",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "5",
            "municipio" => "FORTUL",
            "id_puesto" => "56",
            "puesto" => "CAÑO FLOREZ",
            "mesas" => "3",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "5",
            "municipio" => "FORTUL",
            "id_puesto" => "57",
            "puesto" => "NUEVO CARANAL",
            "mesas" => "5",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "5",
            "municipio" => "FORTUL",
            "id_puesto" => "58",
            "puesto" => "MATECAÑA",
            "mesas" => "2",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "6",
            "municipio" => "PUERTO RONDON",
            "id_puesto" => "52",
            "puesto" => "PUESTO CABECERA MUNICIPAL",
            "mesas" => "12",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "7",
            "municipio" => "SARAVENA",
            "id_puesto" => "59",
            "puesto" => "CENTRO CULT Y DEPORTIVO SIMON",
            "mesas" => "21",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "7",
            "municipio" => "SARAVENA",
            "id_puesto" => "60",
            "puesto" => "IE LA FRONTERA",
            "mesas" => "26",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "7",
            "municipio" => "SARAVENA",
            "id_puesto" => "61",
            "puesto" => "SEDE EDUCATIVA SEIS DE OCTUBRE",
            "mesas" => "18",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "7",
            "municipio" => "SARAVENA",
            "id_puesto" => "62",
            "puesto" => "SEDE EDUCATIVA LAS VILLAS",
            "mesas" => "7",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "7",
            "municipio" => "SARAVENA",
            "id_puesto" => "63",
            "puesto" => "SEDE EDUCATIVA GENERAL SANTANDER",
            "mesas" => "14",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "7",
            "municipio" => "SARAVENA",
            "id_puesto" => "64",
            "puesto" => "IE TEC.IND.RAFAEL POMBO BTO",
            "mesas" => "25",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "7",
            "municipio" => "SARAVENA",
            "id_puesto" => "65",
            "puesto" => "SEDE EDUCATIVA MANUELA BELTRAN",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "7",
            "municipio" => "SARAVENA",
            "id_puesto" => "66",
            "puesto" => "PUERTO NARIÑO",
            "mesas" => "9",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "7",
            "municipio" => "SARAVENA",
            "id_puesto" => "67",
            "puesto" => "RESGUARDO INDIGENAS DE PLAYAS DE BOJABA",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "2",
            "id_municipio" => "7",
            "municipio" => "SARAVENA",
            "id_puesto" => "68",
            "puesto" => "VEREDA VIAS",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        $id_user = 13;
        $coordinadores = 1;
        $consecutivo_nombres = [
            "ARAUCA" => 1,
            "TAME" => 1,
            "ARAUQUITA" => 1,
            "CRAVO NORTE" => 1,
            "FORTUL" => 1,
            "PUERTO RONDON" => 1,
            "SARAVENA" => 1,
        ];
        foreach ($this->pollingStations as $pollingStation) {
            $name = "coor_" . strtolower(str_replace(' ', '', $pollingStation['municipio'])) . (($coordinadores <= 9) ? '00' : (($coordinadores <= 99) ? '0' : '')) . $coordinadores;
            $id_coordinador = $id_user;
            $coordinadores++;
            User::create([
                'id' => $id_user++,
                'name' => $name,
                'email' => $name . '@galaxia.com',
                'password' => Hash::make($name),
                'descripcion' => 'COORDINADOR: '. $pollingStation['municipio'] . "; PUESTO: " .$pollingStation['puesto'],
                'fk_roles' => 3
            ]);
            for ($i = 1; $i <= intval($pollingStation['mesas']); $i++) {

                $temp = $consecutivo_nombres[$pollingStation['municipio']];
                $name =  strtolower(str_replace(' ', '', $pollingStation['municipio'])) . (($temp <= 9) ? '00' : (($temp <= 99) ? '0' : '')) . $temp;
                $consecutivo_nombres[$pollingStation['municipio']] += 1;
                User::create([
                    'id' => $id_user,
                    'name' => $name,
                    'email' => $name . '@galaxia.com',
                    'descripcion' => 'DIGITADOR: '. $pollingStation['municipio'] . "; PUESTO: " .$pollingStation['puesto'] . " Mesa: " . $i,
                    'password' => Hash::make($name),
                    'fk_roles' => 2
                ]);
                if ($pollingStation['id_municipio'] == 1) {
                    FactPollingStation::create([
                        "id" => $id,
                        "fk_dim_cities" => $pollingStation['id_municipio'],
                        "fk_dim_communes" => $pollingStation['id_comuna'],
                        "fk_dim_locations" => $pollingStation['id_puesto'],
                        "fk_dim_elections" => 1,
                        "fk_dim_tables" => $i,
                    ]);
                    FactPermit::create([
                        'fk_users' => $id_coordinador,
                        'fk_fact_polling_stations' => $id
                    ]);
                    FactPermit::create([
                        'fk_users' => $id_user,
                        'fk_fact_polling_stations' => $id++
                    ]);
                }
                FactPollingStation::create([
                    "id" => $id,
                    "fk_dim_cities" => $pollingStation['id_municipio'],
                    "fk_dim_communes" => $pollingStation['id_comuna'],
                    "fk_dim_locations" => $pollingStation['id_puesto'],
                    "fk_dim_elections" => 2,
                    "fk_dim_tables" => $i,
                ]);
                FactPermit::create([
                    'fk_users' => $id_coordinador,
                    'fk_fact_polling_stations' => $id
                ]);
                FactPermit::create([
                    'fk_users' => $id_user++,
                    'fk_fact_polling_stations' => $id++
                ]);
            }
        }
    }
}
