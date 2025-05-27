<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'email', 'senha', 'curso_id','role_id'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function alunos(){
        return $this->hasMany(Aluno::class);
    }

    public function comprovante(){
        return $this->hasMany(Comprovante::class);
    }

    public function documentos(){
        return $this->hasMany(Documento::class);
    }
}
