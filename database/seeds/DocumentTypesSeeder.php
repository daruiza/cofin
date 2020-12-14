<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypesSeeder extends Seeder
{
    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('document_type')->insert(array(			
			'iso' => 'CC',
            'description' => 'Cédula de ciudadanía'
		));

		DB::table('document_type')->insert(array(			
			'iso' => 'CE',
            'description' => 'Cédula de extranjería'
		));

		DB::table('document_type')->insert(array(			
			'iso' => 'NIT',
            'description' => 'Número de Identificación Tributario'
		));

		DB::table('document_type')->insert(array(			
			'iso' => 'PP',
            'description' => 'Pasaporte'
		));

		DB::table('document_type')->insert(array(			
			'iso' => 'IDC',
            'description' => 'Identificador único de cliente'
		));

		DB::table('document_type')->insert(array(			
			'iso' => 'CEL',
            'description' => 'Número móvil'
		));

		DB::table('document_type')->insert(array(			
			'iso' => 'RC',
            'description' => 'Registro civil de nacimiento'
		));

		DB::table('document_type')->insert(array(			
			'iso' => 'DE',
            'description' => 'Documento de identificación extranjero'
		));
    }
}