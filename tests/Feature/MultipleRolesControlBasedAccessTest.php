<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MultipleRolesControlBasedAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_with_certain_roles_can_access_a_shared_route()
{
    foreach (['Raid Leader', 'Raid Assist', 'Raider'] as $roleName) {
        $role = Role::firstOrCreate(['name' => $roleName]);

        $user = User::factory()->create();
        $user->roles()->attach($role);

        $this->actingAs($user);
        $response = $this->get('/shared-access-route');
        $response->assertStatus(200);
    }

    // Test for a user without the required roles
    $nonAuthorizedUser = User::factory()->create();
    $this->actingAs($nonAuthorizedUser);
    $response = $this->get('/shared-access-route');
    $response->assertStatus(403);
}
}
