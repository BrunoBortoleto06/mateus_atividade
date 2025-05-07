<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome', 'email', 'departamento_id'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
    
}
