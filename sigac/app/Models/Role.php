<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome'];

    public function permissoes(){
        return $this->hasMany(Permissao::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
