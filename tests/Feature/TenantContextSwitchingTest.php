<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Tenant;
use App\Models\ExampleModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TenantContextSwitchingTest extends TestCase
{
    protected function setUp(): void{
        parent::setUp();

        // run the database migrations
        $this->artisan('migrate');
    }

    /** @test */
    public function the_application_can_switch_between_tenants()
    {
        $tenant1 = Tenant::create(['tenant_name' => 'Tenant 1', 'slug' => 'tenant1']);
        $tenant2 = Tenant::create(['tenant_name' => 'Tenant 2', 'slug' => 'tenant2']);

        // Set context to tenant1 and create data
        $this->app->instance('tenant', $tenant1);
        ExampleModel::create([
            'field1' => 'Data for Tenant 1',
            'field2' => 'More Data for Tenant 1',
            'tenant_id' => $tenant1->id
        ]);

        // Switch context to tenant2 and assert tenant1's data is not accessible
        $this->app->instance('tenant', $tenant2);
        $this->assertEquals(0, ExampleModel::count());

        // Switch back to tenant1 and assert its data is accessible again
        $this->app->instance('tenant', $tenant1);
        $this->assertEquals(1, ExampleModel::count());
    }

}
