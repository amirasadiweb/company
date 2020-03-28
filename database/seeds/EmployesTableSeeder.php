<?php

use Illuminate\Database\Seeder;
use App\Employe;
class EmployesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Employe::class,20)->create();

    }
}
