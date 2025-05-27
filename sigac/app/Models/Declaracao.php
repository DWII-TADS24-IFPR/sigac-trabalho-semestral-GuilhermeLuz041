<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Declaracao extends Model
{
    use SoftDeletes;

    protected $fillable = ['hash', 'data', 'aluno_id', 'comprovante_id'];

    public function comprovante(){
        return $this->belongsTo(Comprovante::class);
    }

}
