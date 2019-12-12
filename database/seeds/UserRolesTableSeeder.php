<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_roles')->delete();
        
        \DB::table('user_roles')->insert(array (
            0 => 
            array (
                'id' => '1',
                'role' => 'marketing',
                'rules' => '{}',
            ),
            1 => 
            array (
                'id' => '2',
                'role' => 'reseller',
                'rules' => '{}',
            ),
            2 => 
            array (
                'id' => '3',
                'role' => 'agen',
                'rules' => '{}',
            ),
            3 => 
            array (
                'id' => '4',
                'role' => 'distributor',
                'rules' => '{}',
            ),
            4 => 
            array (
                'id' => '5',
                'role' => 'wharehouse',
                'rules' => '{}',
            ),
            5 => 
            array (
                'id' => '6',
                'role' => 'master',
                'rules' => '{"access":"i am one above all"}',
            ),
        ));
        
        
    }
}