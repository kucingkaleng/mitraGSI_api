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
                'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU3NDkwNzkwMywibmJmIjoxNTc0OTA3OTAzLCJqdGkiOiJ4akJxQlM0V3o5akl1QksyIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.-21rxd6KCRWDd2MMMxY37Q0orr6n7YP6ZGn-NdC5DCA',
                'created_at' => '2019-11-28 02:24:55',
                'updated_at' => '2019-11-28 02:25:03',
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
        ));
        
        
    }
}