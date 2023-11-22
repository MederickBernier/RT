<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class TenantScope implements Scope{
    public function apply(Builder $builder, Model $model){
        if($tenant = app()->make('tenant')){
            $builder->where('tenant_id','=', $tenant->id);
        }
    }
}
