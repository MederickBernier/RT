<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{

    protected static function booted(){
        static::addGlobalScope(new TenantScope());
    }
    protected $fillable = ['tenant_name','slug','additional_info'];

    // Relationships and other methods
}
