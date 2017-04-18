<?php

use Illuminate\Database\Seeder;

class CallSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'type' => 't', 'brand' => 't', 'product' => 't', 'model' => 't', 'serial_no' => 't', 'customer_name' => 't', 'customer_mobile' => '8989946073', 'customer_phone' => '8989946073', 'customer_address' => 'near hotel pankaj, birla road', 'complain' => 'akjsndkjn', 'remarks' => 'kjnaskjdnkj', 'bill' => '1492540059-web_hi_res_512.png', 'dealer_id' => 1,],

        ];

        foreach ($items as $item) {
            \App\Call::create($item);
        }
    }
}
