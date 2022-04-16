<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OptionsRolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option_rol')->insert(array(
            'rol_id' => 1,
            'option_id' => 1
        ));
        DB::table('option_rol')->insert(array(
            'rol_id' => 1,
            'option_id' => 2
        ));
        DB::table('option_rol')->insert(array(
            'rol_id' => 1,
            'option_id' => 3
        ));
        DB::table('option_rol')->insert(array(
            'rol_id' => 1,
            'option_id' => 4
        ));
        DB::table('option_rol')->insert(array(
            'rol_id' => 1,
            'option_id' => 5
        ));
    }
}
