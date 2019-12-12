<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('items')->delete();
        
        \DB::table('items')->insert(array (
            0 => 
            array (
                'id' => '1',
                'images' => NULL,
                'item_name' => 'Susu Forpazi',
                'price' => '15000',
                'slug' => 'susu-forpazi',
                'created_at' => '2019-11-28 11:17:39',
                'updated_at' => '2019-11-28 11:17:39',
            ),
            1 => 
            array (
                'id' => '2',
                'images' => NULL,
                'item_name' => 'minyak',
                'price' => '10000',
                'slug' => 'minyak',
                'created_at' => '2019-11-28 11:17:39',
                'updated_at' => '2019-11-28 11:17:39',
            ),
            2 => 
            array (
                'id' => '3',
                'images' => NULL,
                'item_name' => 'minyak bayi',
                'price' => '10000',
                'slug' => 'minyak-bayi',
                'created_at' => '2019-11-28 18:24:52',
                'updated_at' => '2019-11-28 18:24:52',
            ),
        ));
        
        
    }
}