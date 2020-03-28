<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesTableSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Company::class,30)->create();

    }
}
