<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Roles;
use App\Models\JobData;
use App\Models\JobPositions;
use App\Models\Reports;
use App\Models\Outlets;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // creating admin account
        User::factory()->create([
            'name' => 'Dzikry Maulana',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 1,
            'email' => 'admin@reisy.com',
        ]);
        // Create user data dummy
        User::factory()->count(50)->create();

        // create roles
        Roles::factory()->create([
            'role_name' => 'Administrator',
            'access' => 'admin'
        ]);
        Roles::factory()->create([
            'role_name' => 'User',
            'access' => 'user'
        ]);

        // create outlets data dummy
        Outlets::factory()->count(120)->create();

        // create job position data dummy
        JobPositions::factory()->count(12)->create();

        // create job data data dummy
        JobData::factory()->count(51)->create();

        // create report data dummy
        Reports::factory()->count(451)->create();
    }
}
