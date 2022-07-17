<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0; $i<9; $i++){
            DB::table('deliveries')->insert([
                'name'=>Str::random(10),
                'destination'=>Str::random(20),
                'status'=>"pending",
            ]);

        }
    }
}
