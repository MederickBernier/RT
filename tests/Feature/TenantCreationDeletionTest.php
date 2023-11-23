<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Tenant;
use App\Models\ExampleModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TenantCreationDeletionTest extends TestCase
{
    protected function setUp(): void{
        parent::setUp();

        // run the database migrations
        $this->artisan('migrate');
    }

    /** @test */
    public function a_tenant_can_be_created_and_deleted()
    {
        $tenant = Tenant::create(['tenant_name' => 'New Tenant', 'slug' => 'new-tenant']);
        $this->assertDatabaseHas('tenants', ['slug' => 'new-tenant']);

        $tenant->delete();
        $this->assertDatabaseMissing('tenants', ['slug' => 'new-tenant']);
    }

}
