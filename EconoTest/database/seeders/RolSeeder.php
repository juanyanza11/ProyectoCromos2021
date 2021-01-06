<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nombre_rol' => 'administrador',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),  
        ]);


        DB::table('roles')->insert([
            'nombre_rol' => 'estudiante',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),  
        ]);
    }
}
