<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Products;
use App\Models\Seller;
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
        // \App\Models\User::factory(10)->create();
        $arr = ['Phones', 'Kitchen', 'Books', 'Men Wears', 'Women Wears', 'Accessories' ];
        foreach($arr as $a){
            $categories =  \App\Models\Categories::factory()->create([
                'category' => $a
            ]);
        }

        // $arr2 = ['2', '3', '4', '5', '6', '7'];
        // foreach($arr2 as $b){
        //     Seller::factory()->create([
        //         'id' => $b
        //         // 'users_id' => 2
        //     ]);
        // }
        

        // Products::factory(6)->create([
        //     // 'users_id' => 2
        // ]);
    }
}
