<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_contato';
    protected $fillable = ['contato','residencial'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente_fk', 'id_paciente');
    }
}
