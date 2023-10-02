<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LO_tecnico_medico extends Model
{
    protected $table = 'LO_tecnico_medico';
    protected $fillable = array(
        'id',
                            'lo_CMP',
                            'Evaluador_id',
                            'lo_categoria_id'
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
}
