<?php

use Illuminate\Database\Seeder;

class DealerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'shop_name' => 'SPAN Technologies', 'first_name' => 'Aaditya', 'last_name' => 'Tamrakar', 'mobile' => '8989946073', 'phone' => '8989946073', 'city' => 'satna', 'password' => '123',],

        ];

        foreach ($items as $item) {
            \App\Dealer::create($item);
        }
    }
}
