<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Products;
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

        Products::factory(6)->create();
    }
}
