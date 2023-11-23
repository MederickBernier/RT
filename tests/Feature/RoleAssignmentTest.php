<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleAssignmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_be_assigned_a_role(){
        $user = User::factory()->create();
        $role = Role::create(['name' => 'Raider', 'description' => 'Participates in Raid']);

        $user->roles()->attach($role);

        $this->assertTrue($user->roles->contains('name','Raider'));
    }
}
