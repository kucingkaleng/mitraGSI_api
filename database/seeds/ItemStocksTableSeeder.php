<?php

use Illuminate\Database\Seeder;

class ItemStocksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('item_stocks')->delete();
        
        \DB::table('item_stocks')->insert(array (
            0 => 
            array (
                'id' => '1',
                'user_id' => '2',
                'item_id' => '17',
                'qty' => '5',
                'created_at' => '2019-11-28 11:17:39',
                'updated_at' => '2019-11-28 11:17:39',
            ),
            1 => 
            array (
                'id' => '2',
                'user_id' => '2',
                'item_id' => '15',
                'qty' => '4',
                'created_at' => '2019-11-28 11:17:39',
                'updated_at' => '2019-11-28 11:17:39',
            ),
            2 => 
            array (
                'id' => '3',
                'user_id' => '1',
                'item_id' => '17',
                'qty' => '2',
                'created_at' => '2019-11-30 10:16:08',
                'updated_at' => '2019-11-30 10:16:08',
            ),
        ));
        
        
    }
}