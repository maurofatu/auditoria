<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FactPollingStation;

class FactPollingStationSeeder extends Seeder
{

    private $pollingStations = [
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "1",
            "puesto" => "COLEGIO SIMON BOLIVAR",
            "mesas" => "39",
            "id_comuna" => "1",
            "comuna" => "COMUNA 1 RAIMUNDO CISNEROS O."
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "2",
            "puesto" => "CONCENTRACION CAMILO TORRES",
            "mesas" => "22",
            "id_comuna" => "2",
            "comuna" => "COMUNA 2 JOSEFA CANELONES"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "3",
            "puesto" => "ESCUELA LOS LIBERTADORES",
            "mesas" => "7",
            "id_comuna" => "1",
            "comuna" => "COMUNA 1 RAIMUNDO CISNEROS O."
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "4",
            "puesto" => "ESCUELA JOSE MARIA CORDOBA",
            "mesas" => "4",
            "id_comuna" => "2",
            "comuna" => "COMUNA 2 JOSEFA CANELONES"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "5",
            "puesto" => "NORMAL MARIA INMACULADA",
            "mesas" => "24",
            "id_comuna" => "4",
            "comuna" => "COMUNA 4 JOSE LAURENCIO OSIO"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "6",
            "puesto" => "COLEGIO TEC. CRISTO REY",
            "mesas" => "36",
            "id_comuna" => "4",
            "comuna" => "COMUNA 4 JOSE LAURENCIO OSIO"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "7",
            "puesto" => "ESCUELA FLOR DE MI LLANO",
            "mesas" => "27",
            "id_comuna" => "5",
            "comuna" => "COMUNA 5 JUAN JOSE RONDON"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "8",
            "puesto" => "UNIDAD DE SALUD MENTAL ARAUCA",
            "mesas" => "1",
            "id_comuna" => "4",
            "comuna" => "COMUNA 4 JOSE LAURENCIO OSIO"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "9",
            "puesto" => "COLEGIO SANTANDER PRIMARIA",
            "mesas" => "22",
            "id_comuna" => "3",
            "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "10",
            "puesto" => "CONC.ESCOLAR LAS COROCORAS",
            "mesas" => "14",
            "id_comuna" => "3",
            "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "11",
            "puesto" => "CONC.ESCOLAR DIVINO NI\u00d1O",
            "mesas" => "27",
            "id_comuna" => "3",
            "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "12",
            "puesto" => "COL TEC SANTA TERESITA",
            "mesas" => "12",
            "id_comuna" => "3",
            "comuna" => "COMUNA 3 JOSE ANTONIO BENITEZ"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "13",
            "puesto" => "CARCEL",
            "mesas" => "1",
            "id_comuna" => "11",
            "comuna" => "SIN COMUNA"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "14",
            "puesto" => "CA\u00d1AS BRAVAS",
            "mesas" => "2",
            "id_comuna" => "6",
            "comuna" => "CORREGIMIENTO CA\u00d1AS BRAVAS"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "15",
            "puesto" => "MAPORILLAL",
            "mesas" => "1",
            "id_comuna" => "7",
            "comuna" => "CORREGIMIENTO MAPORILLAL"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "16",
            "puesto" => "SANTA BARBARA",
            "mesas" => "4",
            "id_comuna" => "8",
            "comuna" => "CORREGIMIENTO SANTA BARBARA"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "17",
            "puesto" => "CARACOL",
            "mesas" => "2",
            "id_comuna" => "9",
            "comuna" => "CORREGIMIENTO CARACOL"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "18",
            "puesto" => "TODOS LOS SANTOS",
            "mesas" => "3",
            "id_comuna" => "10",
            "comuna" => "CORREGIMIENTO TODOS LOS SANTOS"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "19",
            "puesto" => "LAS NUBES",
            "mesas" => "2",
            "id_comuna" => "10",
            "comuna" => "CORREGIMIENTO TODOS LOS SANTOS"
        ],
        [
            "id_election" => "1",
            "id_municipio" => "1",
            "municipio" => "ARAUCA",
            "id_puesto" => "20",
            "puesto" => "FELICIANO",
            "mesas" => "1",
            "id_comuna" => "9",
            "comuna" => "CORREGIMIENTO CARACOL"
        ],
        [
            "id_election" => "1",
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
            "puesto" => "CA\u00d1O FLOREZ",
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
            "puesto" => "MATECA\u00d1A",
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
            "puesto" => "PUERTO NARI\u00d1O",
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
            "puesto" => "CONC.ESCOLAR DIVINO NI\u00d1O",
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
            "puesto" => "CA\u00d1AS BRAVAS",
            "mesas" => "2",
            "id_comuna" => "6",
            "comuna" => "CORREGIMIENTO CA\u00d1AS BRAVAS"
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
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        foreach ($this->pollingStations as $pollingStation) {
            for ($i = 1; $i <= intval($pollingStation['mesas']); $i++) {
                FactPollingStation::create([
                    "id" => $id++,
                    "fk_dim_cities" => $pollingStation['id_municipio'],
                    "fk_dim_communes" => $pollingStation['id_comuna'],
                    "fk_dim_locations" => $pollingStation['id_puesto'],
                    "fk_dim_elections" => $pollingStation['id_election'],
                    "fk_dim_tables" => $i,
                ]);
            }
        }
    }
}
