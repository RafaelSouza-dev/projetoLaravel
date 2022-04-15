<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_exame'; /*dizendo que o id é id_exame*/

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente_fk', 'id_paciente');
    }
}
