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
                'id' => '2',
                'images' => NULL,
                'item_name' => 'minyak',
                'price' => '10000',
                'description' => NULL,
                'slug' => 'minyak',
                'created_at' => '2019-11-28 11:17:39',
                'updated_at' => '2019-11-28 11:17:39',
            ),
            1 => 
            array (
                'id' => '3',
                'images' => NULL,
                'item_name' => 'minyak bayi',
                'price' => '10000',
                'description' => NULL,
                'slug' => 'minyak-bayi',
                'created_at' => '2019-11-28 18:24:52',
                'updated_at' => '2019-11-28 18:24:52',
            ),
            2 => 
            array (
                'id' => '4',
                'images' => NULL,
                'item_name' => 'kopi',
                'price' => '20000',
                'description' => NULL,
                'slug' => 'kopi',
                'created_at' => '2019-11-28 18:24:52',
                'updated_at' => '2019-11-28 18:24:52',
            ),
            3 => 
            array (
                'id' => '15',
                'images' => 'SunDec12019\\1575177293-0.jpg,SunDec12019\\1575177294-1.jpg',
                'item_name' => 'jamu',
                'price' => '15000',
                'description' => '<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget porttitor ante, sit amet scelerisque sapien. Donec dictum ex vel velit faucibus, sed fermentum elit consectetur.
</p>',
                'slug' => 'jamu',
                'created_at' => '2019-12-01 12:14:54',
                'updated_at' => '2019-12-01 12:14:54',
            ),
            4 => 
            array (
                'id' => '17',
                'images' => 'ThuDec122019\\1576137018-0.jpg',
                'item_name' => 'Susu Forpazi',
                'price' => '15000',
                'description' => '<ul>
<li>Lorem</li>
<li>Ipsum</li>
</ul>',
                'slug' => 'susu-forpazi',
                'created_at' => '2019-12-12 14:50:19',
                'updated_at' => '2019-12-12 14:50:19',
            ),
        ));
        
        
    }
}