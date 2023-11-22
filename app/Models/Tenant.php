<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['tenant_name','slug','additional_info'];

    // Relationships and other methods
}
