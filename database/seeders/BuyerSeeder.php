<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0; $i<10; $i++){
            DB::table('buyers')->insert([
                'name'=>Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'destination'=>Str::random(20),
                'number'=>rand(10000,999999),

            ]);

        }
    }
}
