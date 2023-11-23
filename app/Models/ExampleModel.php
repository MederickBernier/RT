<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExampleModel extends Model
{
    protected $fillable = ['tenant_id', 'field1','field2'];

    protected static function booted(){
        static::addGlobalScope(new TenantScope());
    }

    // Define the relationshop to the Tenant model
    public function tenant(){
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }
}
