<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_vacina';
    protected $fillable = ['nome_vacina','lote_vacina','validade_vacina'];

    public function covid()
    {
        return $this->belongsTo(Covid::class, 'id_vacina_fk', 'id_covid');
    }

    public function primeiraDose()
    {
        return $this->hasOne(PrimeiraDoseCovid::class, 'id_vacina_fk', 'id_vacina');
    }

    public function segundaDose()
    {
        return $this->hasOne(SegundaDoseCovid::class, 'id_vacina_fk', 'id_vacina');
    }
}
