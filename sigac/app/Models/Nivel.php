<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nivel extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome'];

    public function cursos(){
        return $this->hasMany(curso::class);
    }
}
