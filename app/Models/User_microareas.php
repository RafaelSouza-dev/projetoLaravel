<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_microareas extends Model
{
    use HasFactory;

    protected $primarykey = 'id_usermicroareas';

    public function usuarios()
    {
        return $this->hasMany(User::class,'id','id_user_fk');
    }
    public function m_areas()
    {
        return $this->hasMany(M_area::class,'id_m_areas','id_m_areas_fk');
    }
}
