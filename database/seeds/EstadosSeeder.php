<?php

use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$estados = [
    		[
				"id" => 1,
				"nombre" => "Aguascalientes",
				"acronimo" => "AGS",
				"latitud" => "22.031581",
				"longitud" => "-102.349404",
				"zoom" => 9
			],
			[
				"id" => 2,
				"nombre" => "Baja California",
				"acronimo" => "BCN",
				"latitud" => "30.344615",
				"longitud" => "-115.254069",
				"zoom" => 7
			],
			[
				"id" => 3,
				"nombre" => "Baja California Sur",
				"acronimo" => "BCS",
				"latitud" => "25.859411",
				"longitud" => "-111.809855",
				"zoom" => 7
			],
			[
				"id" => 4,
				"nombre" => "Campeche",
				"acronimo" => "CAM",
				"latitud" => "18.755709",
				"longitud" => "-90.584269",
				"zoom" => 7
			],
			[
				"id" => 5,
				"nombre" => "Coahuila",
				"acronimo" => "COH",
				"latitud" => "27.269464",
				"longitud" => "-102.048502",
				"zoom" => 7
			],
			[
				"id" => 6,
				"nombre" => "Colima",
				"acronimo" => "COL",
				"latitud" => "19.134986",
				"longitud" => "-103.861247",
				"zoom" => 10
			],
			[
				"id" => 7,
				"nombre" => "Chiapas",
				"acronimo" => "CHP",
				"latitud" => "16.767927",
				"longitud" => "-92.397013",
				"zoom" => 8
			],
			[
				"id" => 8,
				"nombre" => "Chihuahua",
				"acronimo" => "CHI",
				"latitud" => "28.888152",
				"longitud" => "-106.322184",
				"zoom" => 7
			],
			[
				"id" => 9,
				"nombre" => "Distrito Federal",
				"acronimo" => "DF",
				"latitud" => "19.379669",
				"longitud" => "-99.141565",
				"zoom" => 11
			],
			[
				"id" => 10,
				"nombre" => "Durango",
				"acronimo" => "DUR",
				"latitud" => "24.825858",
				"longitud" => "-104.982858",
				"zoom" => 7
			],
			[
				"id" => 11,
				"nombre" => "Guanajuato",
				"acronimo" => "GUA",
				"latitud" => "20.855130",
				"longitud" => "-101.220782",
				"zoom" => 9
			],
			[
				"id" => 12,
				"nombre" => "Guerrero",
				"acronimo" => "GUE",
				"latitud" => "17.676908",
				"longitud" => "-100.083697",
				"zoom" => 8
			],
			[
				"id" => 13,
				"nombre" => "Hidalgo",
				"acronimo" => "HID",
				"latitud" => "20.530554",
				"longitud" => "-98.884588",
				"zoom" => 9
			],
			[
				"id" => 14,
				"nombre" => "Jalisco",
				"acronimo" => "JAL",
				"latitud" => "20.545890",
				"longitud" => "-103.770857",
				"zoom" => 8
			],
			[
				"id" => 15,
				"nombre" => "México",
				"acronimo" => "MEX",
				"latitud" => "19.488772",
				"longitud" => "-99.655231",
				"zoom" => 9
			],
			[
				"id" => 16,
				"nombre" => "Michoacán",
				"acronimo" => "MIC",
				"latitud" => "19.312151",
				"longitud" => "-101.890408",
				"zoom" => 8
			],
			[
				"id" => 17,
				"nombre" => "Morelos",
				"acronimo" => "MOR",
				"latitud" => "18.746134",
				"longitud" => "-99.078835",
				"zoom" => 10
			],
			[
				"id" => 18,
				"nombre" => "Nayarit",
				"acronimo" => "NAY",
				"latitud" => "21.824775",
				"longitud" => "-104.921345",
				"zoom" => 9
			],
			[
				"id" => 19,
				"nombre" => "Nuevo León",
				"acronimo" => "NVL",
				"latitud" => "25.483674",
				"longitud" => "-99.773412",
				"zoom" => 7
			],
			[
				"id" => 20,
				"nombre" => "Oaxaca",
				"acronimo" => "OAX",
				"latitud" => "17.035450",
				"longitud" => "-96.565018",
				"zoom" => 8
			],
			[
				"id" => 21,
				"nombre" => "Puebla",
				"acronimo" => "PUE",
				"latitud" => "18.988991",
				"longitud" => "-97.848963",
				"zoom" => 8
			],
			[
				"id" => 22,
				"nombre" => "Querétaro",
				"acronimo" => "QRO",
				"latitud" => "20.859397",
				"longitud" => "-99.853569",
				"zoom" => 9
			],
			[
				"id" => 23,
				"nombre" => "Quintana Roo",
				"acronimo" => "QR",
				"latitud" => "19.867213",
				"longitud" => "-87.963099",
				"zoom" => 8
			],
			[
				"id" => 24,
				"nombre" => "San Luis Potosí",
				"acronimo" => "SLP",
				"latitud" => "22.526265",
				"longitud" => "-100.413189",
				"zoom" => 8
			],
			[
				"id" => 25,
				"nombre" => "Sinaloa",
				"acronimo" => "SIN",
				"latitud" => "25.048106",
				"longitud" => "-107.587726",
				"zoom" => 8
			],
			[
				"id" => 26,
				"nombre" => "Sonora",
				"acronimo" => "SON",
				"latitud" => "30.064387",
				"longitud" => "-111.311709",
				"zoom" => 7
			],
			[
				"id" => 27,
				"nombre" => "Tabasco",
				"acronimo" => "TAB",
				"latitud" => "18.145850",
				"longitud" => "-92.707880",
				"zoom" => 8
			],
			[
				"id" => 28,
				"nombre" => "Tamaulipas",
				"acronimo" => "TAM",
				"latitud" => "24.527701",
				"longitud" => "-98.516009",
				"zoom" => 8
			],
			[
				"id" => 29,
				"nombre" => "Tlaxcala",
				"acronimo" => "TLA",
				"latitud" => "19.447217",
				"longitud" => "-98.153383",
				"zoom" => 10
			],
			[
				"id" => 30,
				"nombre" => "Veracruz",
				"acronimo" => "VER",
				"latitud" => "19.510988",
				"longitud" => "-96.697493",
				"zoom" => 7
			],
			[
				"id" => 31,
				"nombre" => "Yucatán",
				"acronimo" => "YUC",
				"latitud" => "20.794774",
				"longitud" => "-89.036793",
				"zoom" => 8
			],
			[
				"id" => 32,
				"nombre" => "Zacatecas",
				"acronimo" => "ZAC",
				"latitud" => "23.188936",
				"longitud" => "-103.045611",
				"zoom" => 8
			]];

		foreach ($estados as $key => $estado)
			DB::table('estados')->insert($estado);
    }
}
