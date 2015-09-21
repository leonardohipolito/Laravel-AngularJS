<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \FacilitaProject\Entities\Client::truncate();
        factory(\FacilitaProject\Entities\Client::class,10)->create();
    }
}
