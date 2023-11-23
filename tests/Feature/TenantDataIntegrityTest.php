<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Tenant;
use App\Models\ExampleModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TenantDataIntegrityTest extends TestCase
{
    protected function setUp(): void{
        parent::setUp();

        // run the database migrations
        $this->artisan('migrate');
    }

    /** @test */
    public function deleting_a_tenant_also_handles_related_data()
    {
        $tenant = Tenant::create(['tenant_name' => 'Test Tenant', 'slug' => 'test-tenant']);
        ExampleModel::create([
            'field1' => 'Data',
            'field2' => 'More Data',
            'tenant_id' => $tenant->id
        ]);

        $tenant->delete();

        // Assert the related data is also removed or handled as per your business logic
        $this->assertDatabaseMissing('example_models', ['tenant_id' => $tenant->id]);
    }

}
