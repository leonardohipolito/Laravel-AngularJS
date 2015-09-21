<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \FacilitaProject\Entities\Project::truncate();
        factory(\FacilitaProject\Entities\Project::class,10)->create();
    }
}
