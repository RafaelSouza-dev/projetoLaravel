<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rua extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rua';
    protected $fillable = ['id_microarea_fk','nome_rua','nome_bairro','cep'];

    public function microarea()
    {
        return $this->belongsTo(M_area::class, 'id_microarea_fk', 'id_m_areas');
    }
}
