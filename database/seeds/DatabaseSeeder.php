<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(ModulesSeeder::class);
        $this->call(OptionsSeeder::class);
        $this->call(OptionsRolsSeeder::class);
        $this->call(AcountsSeeder::class);    
        $this->call(CommercesSeeder::class);
        $this->call(UserSeeder::class);
        
    }
}
