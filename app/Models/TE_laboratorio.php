<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TE_laboratorio extends Model
{
    protected $table = 'TE_laboratorio';
    protected $fillable = array(
                            'id',
                            'lo_categoria_id',
                            'Evaluador_id',
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
}
