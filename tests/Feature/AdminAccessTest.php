<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_access_all_routes(){
        $admin = User::factory()->create();
        $adminRole = Role::create(['name' => 'Admin']);
        $admin->roles()->attach($adminRole);

        $this->actingAs($admin);

        // Test Access to a route restricted to Raid Leader
        $response = $this->get('/raid-leader-only-route');
        $response->assertStatus(200);
        $response->assertJson(['message' => 'Raid Leader Only Page']);

        // Test Access to a shared access route
        $response = $this->get('/shared-access-route');
        $response->assertStatus(200);
        $response->assertJson(['message'=> 'Shared Access Page']);
    }
}
