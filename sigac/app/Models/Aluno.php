<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'curso_id', 'turma_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

    public function comprovantes(){
        return $this->hasMany(Comprovante::class);
    }

}
