<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Tenant;
use App\Models\ExampleModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnauthorizedTenantAccessTest extends TestCase
{
    protected function setUp(): void{
        parent::setUp();

        // run the database migrations
        $this->artisan('migrate');
    }

    /** @test */
    public function a_user_cannot_access_data_from_an_unauthorized_tenant()
    {
        $tenant1 = Tenant::create(['tenant_name' => 'Tenant 1', 'slug' => 'tenant1']);
        $tenant2 = Tenant::create(['tenant_name' => 'Tenant 2', 'slug' => 'tenant2']);
        ExampleModel::create([
            'field1' => 'Tenant 1 Data',
            'field2' => 'More Tenant 1 Data',
            'tenant_id' => $tenant1->id
        ]);

        // Simulate context as tenant2
        $this->app->instance('tenant', $tenant2);

        // Assert that tenant2 cannot access tenant1's data
        $this->assertEquals(0, ExampleModel::where('field1', 'Tenant 1 Data')->count());
    }

}
