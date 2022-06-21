<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_area extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_m_areas';

    protected $fillable = ['numero_microarea'];

    public function rua()
    {
        return $this->hasMany(Rua::class, 'id_microarea_fk', 'id_m_areas');
    }
    public function paciente()
    {
        return $this->hasMany(Paciente::class, 'id_microarea_fk', 'id_m_areas');
    }
    public function usuario()
    {
        return $this->belongsToMany(User::class, 'user_microareas','id_m_areas_fk','id_user_fk')->withPivot('id_user_fk');
    }
}
