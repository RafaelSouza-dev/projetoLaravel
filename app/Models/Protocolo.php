<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protocolo extends Model
{
    use HasFactory;

    protected $primaryKey ='id_protocolo';
    protected $fillable = ['documento','tipo_documento'];

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class,'entrega_protocolos','id_protocolo_fk','id_paciente_fk')->withPivot('id_entrega','tipo_documento','data_entrega','entrega_pessoa_confianca','nome_pessoa_confianca','rg_pessos_confianca','cpf_pessoa_confianca');
    }
}
