<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScopedWithSessionDataTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_can_access_data_scoped_to_their_raid_group()
    {
        $tenant1 = Tenant::create(['name' => 'Tenant 1','slug' => 'tenant-1', 'raid_group_id' => 1, 'tenant_name' => 'Tenant 1 Name']);
        $tenant2 = Tenant::create(['name' => 'Tenant 2','slug' => 'tenant-2', 'raid_group_id' => 2, 'tenant_name' => 'Tenant 2 Name']);

        $raiderRole = Role::firstOrCreate(['name' => 'Raider']);

        // User in Tenant 1
        $userInTenant1 = User::factory()->create(['tenant_id' => $tenant1->id]);
        $userInTenant1->roles()->attach($raiderRole);

        // User in Tenant 2
        $userInTenant2 = User::factory()->create(['tenant_id' => $tenant2->id]);
        $userInTenant2->roles()->attach($raiderRole);

        // Simulate user in Tenant 1 accessing a common route
        $this->actingAs($userInTenant1)
            ->withSession(['raid_group_id' => $tenant1->raid_group_id])
            ->get('/common-route')
            ->assertStatus(200)
            ->assertSee('Data for Raid Group 1');

        // Simulate user in Tenant 2 accessing the same common route
        $this->actingAs($userInTenant2)
            ->withSession(['raid_group_id' => $tenant2->raid_group_id])
            ->get('/common-route')
            ->assertStatus(200)
            ->assertSee('Data for Raid Group 2');
    }
}
