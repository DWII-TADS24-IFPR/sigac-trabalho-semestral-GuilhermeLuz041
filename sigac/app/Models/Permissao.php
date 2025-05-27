<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissao extends Model
{
    use SoftDeletes;

    protected $fillable = ['role_id', 'resource_id','permission'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

}
