<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    protected $fillable = ['name','description'];

    public function users(){
        return $this->belongsToMany(User::class,'user_roles','role_id','user_id');
    }
}
