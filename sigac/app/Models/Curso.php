<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Curso extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'sigla', 'total_horas', 'nivel_id','eixo_id'];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function eixo()
    {
        return $this->belongsTo(Eixo::class);
    }
    
    public function categorias(){
        return $this->hasMany(Categoria::class);
    }

    public function turmas(){
        return $this->hasMany(Turma::class);
    }
}
