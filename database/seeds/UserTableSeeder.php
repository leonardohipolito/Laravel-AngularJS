<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FacilitaProject\Entities\User::class)->create([
                 'name' => 'Leonardo',
                 'email' => 'leonardohipolito@outlook.com',
                 'password' => bcrypt('123456'),
                 'remember_token' => str_random(10),
             ]
        );
        factory(FacilitaProject\Entities\User::class,10)->create();
    }
}
