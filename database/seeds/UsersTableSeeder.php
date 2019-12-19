<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => '1',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$RR7h/PR6eL.DaPIIKY45TeDLvsXF77TEcb01R4LzZgwYCkpfHKWEe',
                'role_id' => '6',
                'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU3NTA4MTMwNCwibmJmIjoxNTc1MDgxMzA0LCJqdGkiOiJab2ppS2x0czlXWjR6MjdkIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.Dt0lhEnkNBJBhAgVhidOcYHhgVJymd3ud0Zt-m9Xs34',
                'created_at' => '2019-11-28 02:24:55',
                'updated_at' => '2019-11-30 09:35:04',
            ),
            1 => 
            array (
                'id' => '2',
                'username' => 'reseller',
                'email' => 'reseller@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$afUDP8Eq0BzLpPUJfIjVT.HYnPTtcbhPRJia8F4BQBSX2perYKmgC',
                'role_id' => '2',
                'token' => NULL,
                'created_at' => '2019-11-28 02:46:21',
                'updated_at' => '2019-11-28 02:46:21',
            ),
            2 => 
            array (
                'id' => '5',
                'username' => 'distributor',
                'email' => 'distributor@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$8YuD0oLyoB88xH4J2HxvQeKrvjH8rpDeM5NzdrlOYcjdTK74kwWyS',
                'role_id' => '4',
                'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU3NjEzNTY0NywibmJmIjoxNTc2MTM1NjQ3LCJqdGkiOiJ5aFluZURzTHVJallOQzcxIiwic3ViIjo1LCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.PcyWySBILj4gp_uAk-mqEA_eBoMsYRuznb0iVZ8WCrc',
                'created_at' => '2019-12-12 14:27:15',
                'updated_at' => '2019-12-12 14:27:27',
            ),
        ));
        
        
    }
}