<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TenantTest extends TestCase
{

    protected function setUp(): void{
        parent::setUp();

        // run the database migrations
        $this->artisan('migrate');
    }

    /** @test */
    public function it_can_create_a_tenant(){
        $tenant = Tenant::create([
            'tenant_name' => 'Test Tenant',
            'slug' => 'test-tenant'
        ]);
        $this->assertDatabaseHas('tenants',['tenant_name' => 'Test Tenant']);
    }
}
