<?php

use Illuminate\Database\Seeder;

class UserDatasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_datas')->delete();
        
        \DB::table('user_datas')->insert(array (
            0 => 
            array (
                'id' => '1',
                'user_id' => '1',
                'name' => 'Admin User',
            ),
            1 => 
            array (
                'id' => '2',
                'user_id' => '2',
                'name' => 'Reseller User',
            ),
        ));
        
        
    }
}