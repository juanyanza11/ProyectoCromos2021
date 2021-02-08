<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CromoTematicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // CROMOS QUE PERTENECEN A TEMATICA PRESEIDENTES
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 1,
            'tematica_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 2,
            'tematica_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 3,
            'tematica_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 4,
            'tematica_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 5,
            'tematica_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 6,
            'tematica_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 7,
            'tematica_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 8,
            'tematica_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 9,
            'tematica_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 10,
            'tematica_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //CROMOS QUE PERTENECEN A TEMATICA FUTBOL
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 11,
            'tematica_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromo_tematica')->insert([
            'cromo_id' => 12,
            'tematica_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromo_tematica')->insert([
            'cromo_id' => 13,
            'tematica_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromo_tematica')->insert([
            'cromo_id' => 14,
            'tematica_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromo_tematica')->insert([
            'cromo_id' => 15,
            'tematica_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromo_tematica')->insert([
            'cromo_id' => 16,
            'tematica_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromo_tematica')->insert([
            'cromo_id' => 17,
            'tematica_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromo_tematica')->insert([
            'cromo_id' => 18,
            'tematica_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromo_tematica')->insert([
            'cromo_id' => 19,
            'tematica_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromo_tematica')->insert([
            'cromo_id' => 20,
            'tematica_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromo_tematica')->insert([
            'cromo_id' => 21,
            'tematica_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cromo_tematica')->insert([
            'cromo_id' => 22,
            'tematica_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 23,
            'tematica_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('cromo_tematica')->insert([
            'cromo_id' => 24,
            'tematica_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
