<?php

use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            'id' => 1,
            'label' => 'Manga',
        ]);
        DB::table('product_types')->insert([
            'id' => 2,
            'label' => 'Anime',
        ]);
        DB::table('product_types')->insert([
            'id' => 3,
            'label' => 'Light Novel',
        ]);
        DB::table('product_types')->insert([
            'id' => 4,
            'label' => 'Film',
        ]);
    }
}
