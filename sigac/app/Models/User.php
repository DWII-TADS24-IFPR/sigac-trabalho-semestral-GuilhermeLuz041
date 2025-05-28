<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = ['nome', 'email', 'password', 'curso_id','role_id'];
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }


    public function alunos(){
        return $this->hasOne(Aluno::class);
    }

    public function comprovante(){
        return $this->hasMany(Comprovante::class);
    }

    public function documentos(){
        return $this->hasMany(Documento::class);
    }
}
