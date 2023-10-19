<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FactCandidate;

class FactCandidateSeeder extends Seeder
{
    private $candidates = [
        [
            "id_election" => "1",
            "id_person" => "1",
            "id_political" => "1",
            "id_identification" => "1",
            "prinom" => "Egdumar",
            "segnom" => "",
            "priape" => "Chavez",
            "segape" => "Arana"
        ],
        [
            "id_election" => "1",
            "id_person" => "2",
            "id_political" => "1",
            "id_identification" => "2",
            "prinom" => "Juan",
            "segnom" => "Alfredo",
            "priape" => "Quenza",
            "segape" => ""
        ],
        [
            "id_election" => "1",
            "id_person" => "3",
            "id_political" => "1",
            "id_identification" => "3",
            "prinom" => "Camilo",
            "segnom" => "Andres",
            "priape" => "Gonzalez",
            "segape" => ""
        ],
        [
            "id_election" => "1",
            "id_person" => "4",
            "id_political" => "1",
            "id_identification" => "4",
            "prinom" => "Wilson",
            "segnom" => "Hernando",
            "priape" => "Perez",
            "segape" => ""
        ],
        [
            "id_election" => "1",
            "id_person" => "5",
            "id_political" => "1",
            "id_identification" => "5",
            "prinom" => "Yomar",
            "segnom" => "Asdrubal",
            "priape" => "Reyes",
            "segape" => ""
        ],
        [
            "id_election" => "1",
            "id_person" => "6",
            "id_political" => "1",
            "id_identification" => "6",
            "prinom" => "William",
            "segnom" => "Paul",
            "priape" => "Leon",
            "segape" => "Roa"
        ],
        [
            "id_election" => "1",
            "id_person" => "7",
            "id_political" => "1",
            "id_identification" => "7",
            "prinom" => "Jose",
            "segnom" => "Hernando",
            "priape" => "Gonzalez",
            "segape" => ""
        ],
        [
            "id_election" => "1",
            "id_person" => "8",
            "id_political" => "1",
            "id_identification" => "8",
            "prinom" => "Oscar",
            "segnom" => "",
            "priape" => "Mari\u00c3\u00b1o",
            "segape" => "Monta\u00c3\u00b1o"
        ],
        [
            "id_election" => "1",
            "id_person" => "9",
            "id_political" => "1",
            "id_identification" => "9",
            "prinom" => "Andres",
            "segnom" => "",
            "priape" => "Padilla",
            "segape" => "Avila"
        ],
        [
            "id_election" => "1",
            "id_person" => "10",
            "id_political" => "1",
            "id_identification" => "10",
            "prinom" => "Ehiana",
            "segnom" => "",
            "priape" => "Galeano",
            "segape" => "Reyes"
        ],
        [
            "id_election" => "1",
            "id_person" => "11",
            "id_political" => "1",
            "id_identification" => "11",
            "prinom" => "Roger",
            "segnom" => "Alcides",
            "priape" => "Cisneros",
            "segape" => ""
        ],
        [
            "id_election" => "1",
            "id_person" => "12",
            "id_political" => "1",
            "id_identification" => "12",
            "prinom" => "Dumar",
            "segnom" => "Jose",
            "priape" => "Quintero",
            "segape" => ""
        ],
        [
            "id_election" => "1",
            "id_person" => "13",
            "id_political" => "1",
            "id_identification" => "13",
            "prinom" => "Juan",
            "segnom" => "Carlos",
            "priape" => "Casta\u00c3\u00b1eda",
            "segape" => ""
        ],
        [
            "id_election" => "1",
            "id_person" => "24",
            "id_political" => "1",
            "id_identification" => "14",
            "prinom" => "Votos",
            "segnom" => "",
            "priape" => "en Blanco",
            "segape" => ""
        ],
        [
            "id_election" => "1",
            "id_person" => "25",
            "id_political" => "1",
            "id_identification" => "15",
            "prinom" => "Votos",
            "segnom" => "",
            "priape" => "Nulos",
            "segape" => ""
        ],
        [
            "id_election" => "1",
            "id_person" => "26",
            "id_political" => "1",
            "id_identification" => "16",
            "prinom" => "Votos",
            "segnom" => "",
            "priape" => "No Marcados",
            "segape" => ""
        ],
        [
            "id_election" => "1",
            "id_person" => "27",
            "id_political" => "1",
            "id_identification" => "17",
            "prinom" => "Total",
            "segnom" => "",
            "priape" => "Votos",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "14",
            "id_political" => "1",
            "id_identification" => "1",
            "prinom" => "Manuel",
            "segnom" => "",
            "priape" => "Calderon",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "15",
            "id_political" => "1",
            "id_identification" => "2",
            "prinom" => "Manuel",
            "segnom" => "",
            "priape" => "Perez",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "16",
            "id_political" => "1",
            "id_identification" => "3",
            "prinom" => "Julieth",
            "segnom" => "",
            "priape" => "Jimenez",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "17",
            "id_political" => "1",
            "id_identification" => "4",
            "prinom" => "Clara",
            "segnom" => "",
            "priape" => "Godoy",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "18",
            "id_political" => "1",
            "id_identification" => "5",
            "prinom" => "Miguel",
            "segnom" => "",
            "priape" => "Hernandez",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "19",
            "id_political" => "1",
            "id_identification" => "6",
            "prinom" => "Renson",
            "segnom" => "",
            "priape" => "Martinez",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "20",
            "id_political" => "1",
            "id_identification" => "7",
            "prinom" => "Albeiro",
            "segnom" => "",
            "priape" => "Vanegas",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "21",
            "id_political" => "1",
            "id_identification" => "8",
            "prinom" => "Nixon",
            "segnom" => "",
            "priape" => "Barre\u00c3\u00b1o",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "22",
            "id_political" => "1",
            "id_identification" => "9",
            "prinom" => "Juan",
            "segnom" => "Pablo",
            "priape" => "Jimenez",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "23",
            "id_political" => "1",
            "id_identification" => "10",
            "prinom" => "Ivan",
            "segnom" => "Dario",
            "priape" => "Gomez",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "24",
            "id_political" => "1",
            "id_identification" => "11",
            "prinom" => "Votos",
            "segnom" => "",
            "priape" => "en Blanco",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "25",
            "id_political" => "1",
            "id_identification" => "12",
            "prinom" => "Votos",
            "segnom" => "",
            "priape" => "Nulos",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "26",
            "id_political" => "1",
            "id_identification" => "13",
            "prinom" => "Votos",
            "segnom" => "",
            "priape" => "No Marcados",
            "segape" => ""
        ],
        [
            "id_election" => "2",
            "id_person" => "27",
            "id_political" => "1",
            "id_identification" => "14",
            "prinom" => "Total",
            "segnom" => "",
            "priape" => "Votos",
            "segape" => ""
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
        foreach($this->candidates as $candidate){
            FactCandidate::create([
                "id" => $id++,
                "fk_dim_political_parties" => $candidate['id_political'],
                "fk_dim_identifications" => $candidate['id_identification'],
                "fk_dim_people" => $candidate['id_person'],
                "fk_dim_elections" => $candidate['id_election'],
            ]);
        }
    }
}
