<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0; $i<50; $i++){
            DB::table('products')->insert([
                'pname'=>Str::random(10),
                'price'=>rand(10,100),
                'category'=>Str::random(10),
                'quantity'=>rand(100,500),

            ]);

        }
            
    }
}
