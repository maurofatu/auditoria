<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimLocation;

class DimLocationSeeder extends Seeder
{
    private $locations = [
        ['description'=>'COLEGIO SIMON BOLIVAR'],
        ['description'=>'CONCENTRACION CAMILO TORRES'],
        ['description'=>'ESCUELA LOS LIBERTADORES'],
        ['description'=>'ESCUELA JOSE MARIA CORDOBA'],
        ['description'=>'NORMAL MARIA INMACULADA'],
        ['description'=>'COLEGIO TEC. CRISTO REY'],
        ['description'=>'ESCUELA FLOR DE MI LLANO'],
        ['description'=>'UNIDAD DE SALUD MENTAL ARAUCA'],
        ['description'=>'COLEGIO SANTANDER PRIMARIA'],
        ['description'=>'CONC.ESCOLAR LAS COROCORAS'],
        ['description'=>'CONC.ESCOLAR DIVINO NIÑO'],
        ['description'=>'COL TEC SANTA TERESITA'],
        ['description'=>'CARCEL'],
        ['description'=>'CAÑAS BRAVAS'],
        ['description'=>'MAPORILLAL'],
        ['description'=>'SANTA BARBARA'],
        ['description'=>'CARACOL'],
        ['description'=>'TODOS LOS SANTOS'],
        ['description'=>'LAS NUBES'],
        ['description'=>'FELICIANO'],
        ['description'=>'CLARINETERO'],
        ['description'=>'COL. INST. ORIENTAL FEMENINO'],
        ['description'=>'ESCUELA SAN ANTONIO'],
        ['description'=>'COLISEO CUBIERTO LOS LIBERTADORES'],
        ['description'=>'COLEGIO FROILAN FARIAS'],
        ['description'=>'CIUDADELA UNIVERSITARIA'],
        ['description'=>'BETOYES'],
        ['description'=>'PUERTO GAITAN'],
        ['description'=>'PUERTO SAN SALVADOR'],
        ['description'=>'LA HOLANDA'],
        ['description'=>'LA ARENOSA'],
        ['description'=>'LAS MALVINAS'],
        ['description'=>'PUERTO JORDAN'],
        ['description'=>'CACHAMA'],
        ['description'=>'EL BOTALON'],
        ['description'=>'EL TABLON'],
        ['description'=>'CENTRO POBLADO  COROCITO'],
        ['description'=>'IE LICEO DEL LLANO'],
        ['description'=>'IE LICEO DEL LLANO SEDE SIMON BOLIVAR'],
        ['description'=>'IE GABRIEL GARCIA MARQUEZ SEC PRIMARIA'],
        ['description'=>'IE GABRIEL GARCIA MARQUEZ SEC SECUNDARIA'],
        ['description'=>'AGUACHICA'],
        ['description'=>'LA ESMERALDA'],
        ['description'=>'LA PAZ'],
        ['description'=>'REINERA'],
        ['description'=>'LA PESQUERA'],
        ['description'=>'BRISAS DEL CARANAL'],
        ['description'=>'RESGUARDO INDIGENA EL VIGIA'],
        ['description'=>'RESGUARDO INDIGENA SAN JOSE DE LIPA'],
        ['description'=>'RESGUARDO INDIGENA IGUANITOS'],
        ['description'=>'PANAMA DE ARAUCA'],
        ['description'=>'PUESTO CABECERA MUNICIPAL'],
        ['description'=>'RESGUARDO INDIGENA CANANAMA'],
        ['description'=>'POLIDEPORTIVO MUNICIPAL'],
        ['description'=>'CONCENTRACION ALEJANDRO HUMBOLDT'],
        ['description'=>'CAÑO FLOREZ'],
        ['description'=>'NUEVO CARANAL'],
        ['description'=>'MATECAÑA'],
        ['description'=>'CENTRO CULT Y DEPORTIVO SIMON'],
        ['description'=>'IE LA FRONTERA'],
        ['description'=>'SEDE EDUCATIVA SEIS DE OCTUBRE'],
        ['description'=>'SEDE EDUCATIVA LAS VILLAS'],
        ['description'=>'SEDE EDUCATIVA GENERAL SANTANDER'],
        ['description'=>'IE TEC.IND.RAFAEL POMBO BTO'],
        ['description'=>'SEDE EDUCATIVA MANUELA BELTRAN'],
        ['description'=>'PUERTO NARIÑO'],
        ['description'=>'RESGUARDO INDIGENAS DE PLAYAS DE BOJABA'],
        ['description'=>'VEREDA VIAS']
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        foreach($this->locations as $location){
            DimLocation::create([
                "id" => $id ++,
                "description" => $location['description']
            ]);
        }
    }
}
