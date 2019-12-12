<?php

use Illuminate\Database\Seeder;

class OrderHistoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('order_histories')->delete();
        
        
        
    }
}