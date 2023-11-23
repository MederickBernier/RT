<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Tenant;
use App\Models\ExampleModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MultiTenancyTest extends TestCase
{

    protected function setUp(): void{
        parent::setUp();

        // run the database migrations
        $this->artisan('migrate');
    }

    /** @test */
    public function data_is_isolated_across_tenants(){
        // Create two tenants
        $tenant1 = Tenant::create([
            'tenant_name' => 'Tenant 1',
            'slug' => 'tenant1',
        ]);
        $tenant2 = Tenant::create([
            'tenant_name' => 'Tenant 2',
            'slug' => 'tenant2',
        ]);

        // Simulate setting the context to tenant 1
        $this->app->instance('tenant', $tenant1);

        // Create data for tenant1
        ExampleModel::create([
            'field1' => 'Data for Tenant 1 Field 1',
            'field2' => 'Data for Tenant 1 Field 2',
            'tenant_id' => $tenant1->id
        ]);

        // Assert that the data for tenant1 is accessible
        $this->assertEquals(1, ExampleModel::count());

        // Change context to tenant2
        $this->app->instance('tenant', $tenant2);

        // Assert that tenant2 has no access to tenant1's data
        $this->assertEquals(0, ExampleModel::count());
    }

}
