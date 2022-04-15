<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaProtocolo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_entrega';

    protected $fillable = ['id_protocolo_fk','descricao_documento','tipo_documento','data_entrega','entrega_pessoa_confianca','nome_pessoa_confianca','rg_pessoa_confianca','cpf_pessoa_confianca'];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class,'id_paciente','id_paciente_fk');
    }
    public function protocolos()
    {
        return $this->hasMany(Protocolo::class,'id_protocolo','id_protocolo_fk');
    }
}

