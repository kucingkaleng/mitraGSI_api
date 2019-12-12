<?php

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

        $this->call(UsersTableSeeder::class);
        $this->call(UserDatasTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ItemStocksTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderHistoriesTableSeeder::class);
        $this->call(OrderStatusesTableSeeder::class);
    }
}
