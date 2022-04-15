<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $primaryKey ='id_endereco';
    protected $fillable = ['rua','complemento','numero','bairro','cidade','uf'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente_fk', 'id_paciente');
    }
}
