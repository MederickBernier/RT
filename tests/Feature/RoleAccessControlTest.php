<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleAccessControlTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function raid_leader_can_access_raid_management_route(){
        $user = User::factory()->create();
        $role = Role::create(['name' => 'Raid Leader']);
        $user->roles()->attach($role);

        $this->actingAs($user);

        $response = $this->get('/raid-management');
        $response->assertStatus(200);
        $response->assertJson(['message' => 'Raid Management Page']);
    }

    /** @test */
    public function non_raid_leader_cannot_access_raid_management_route(){
        $user = User::factory()->create();
        $role = Role::create(['name' => 'Raider']);
        $user->roles()->attach($role);

        $this->actingAs($user);

        $response = $this->get('/raid-management');
        $response->assertStatus(403);
    }
}
