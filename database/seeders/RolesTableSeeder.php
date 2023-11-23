<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Raid Leader','description' => 'Leads the Raid']);
        Role::create(['name' => 'Raid Assist','description' => 'Assists in Raid']);
        Role::create(['name' => 'Raider','description' => 'Participates in Raid']);
        Role::create(['name' => 'Bench','description' => 'On Standby for raids']);
    }
}
