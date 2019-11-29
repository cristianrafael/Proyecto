<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
    		["nombre" => "Ventas"],
    		["nombre" => "Atencion a clientes"],
    		["nombre" => "Almacen"],
    		["nombre" => "Logistica"],
    		["nombre" => "Transporte"],
    		["nombre" => "Administración"],
    		["nombre" => "Oficina"],
    		["nombre" => "Contabilidad"],
    		["nombre" => "Finanzas"],
    		["nombre" => "Informática"],
    		["nombre" => "Telecomunicaciones"],
    		["nombre" => "Hosteleria"],
    		["nombre" => "Turismo"],
    		["nombre" => "CallCenter"],
    		["nombre" => "Telemercadeo"],
    		["nombre" => "Producción"],
    		["nombre" => "Operarios"],
    		["nombre" => "Manufactura"],
    		["nombre" => "Servicios Generales"],
    		["nombre" => "Aseo y Seguridad"],
    		["nombre" => "Mantenimiento y Reparaciones"],
    		["nombre" => "Técnicas"],
    		["nombre" => "Recursos Humanos"],
    		["nombre" => "Medicina y Salud"],
    		["nombre" => "Ingeniería"],
    		["nombre" => "Mercadotecnica y Publicidad"],
    		["nombre" => "Comunicación"],
    		["nombre" => "Construccion y obra"],
    		["nombre" => "Docencia"],
    		["nombre" => "Legal o Asesoría"],
    		["nombre" => "Compras"],
    		["nombre" => "Comercio Exterior"],
    		["nombre" => "Diseño"],
    		["nombre" => "Artes graficas"],
    		["nombre" => "Investigacion y Calidad"],
    		["nombre" => "Direccion y Generencia"],
    		["nombre" => "Otros"]
    	];
    	
    	foreach ($categorias as $key => $categoria)
			DB::table('categorias')->insert($categoria);	
    }
}
