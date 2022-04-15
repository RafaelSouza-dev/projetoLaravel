<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_covid'; /*dizendo que o id é id_covid*/

    protected $casts = [

        'sintomas' => 'array' /*dizendo que é um array*/
    ];
    protected $fillable = ['primeira_dose','segunda_dose','terceira_dose','fez_teste','resultado_teste','data_testagem','sintomas','celular','residencial'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente_fk', 'id_paciente');
    }

    /*public function profissional()
    {
        return $this->hasMany(ProfissionalSaude::class, 'id_profissional_saude_fk', 'id_profissional_saude');
    }

    public function vacina()
    {
        return $this->hasMany(Vacina::class, 'id_vacina_fk', 'id_vacina');
    }*/

}
