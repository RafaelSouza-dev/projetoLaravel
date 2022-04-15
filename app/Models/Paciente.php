<?php

namespace App\Models;

use App\Http\Controllers\Entrega_Protocolos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $casts = [

        'comorbidades' => 'array' /*dizendo que 'comorbidades' é um array*/
    ];
    //protected $guarded = []; para atualizar os campos ,exceto esses dentro do array

    protected $primaryKey = 'id_paciente'; /*dizendo que o id é id_paciente*/

    //protected $fillable = ['microarea'];

    protected $fillable = ['sus','nome_paciente','rg_paciente','cpf_paciente','datanascimento_paciente','nome_pai_paciente','nome_mae_paciente','sexo_paciente','comorbidades','id_microarea_fk'];

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'id_paciente_fk', 'id_paciente');
    }

    public function contato()
    {
        return $this->hasMany(Contato::class, 'id_paciente_fk', 'id_paciente');
    }
    public function microarea()
    {
        return $this->belongsTo(M_area::class, 'id_microarea_fk', 'id_m_areas');
    }
   public function auxiliobrasil()
    {
        return $this->hasOne(AuxilioBrasil::class, 'id_paciente_fk', 'id_paciente');
    }
    public function protocolos()
    {
        return $this->belongsToMany(Protocolo::class,'entrega_protocolos', 'id_paciente_fk','id_protocolo_fk')->withPivot('id_entrega','tipo_documento','data_entrega','entrega_pessoa_confianca','nome_pessoa_confianca','rg_pessoa_confianca','cpf_pessoa_confianca');
    }
    public function comorbidades()
    {
        return $this->belongsToMany(Comorbidade::class,'comorbidade_pacientes','id_paciente_fk','id_comorbidade_fk');
    }
   /* public function microareaTeste()
    {
        return $this->belongsTo(M_area::class, 'id_microarea_fk', 'id_m_areas');
    }*/

}

