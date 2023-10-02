<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TE_medico_especialista extends Model
{
    protected $table = 'TE_medico_especialista';
    protected $fillable = array(
        'id',
                            'ME_RNE',
                            'ME_CMP',
                            
                            'Evaluador_id',
                            'me_categoria_id',
                            
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
}
