<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Database\Factories\CompanyFactory;
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
        // \App\Models\User::factory(10)->create();

        Company::factory()->count(30)->create()->each(function($c){
                Employee::factory()->count(100)->create(['company_id' => $c->id]);
            }
        );
    }
}
