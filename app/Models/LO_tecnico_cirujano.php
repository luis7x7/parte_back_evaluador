<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LO_tecnico_cirujano extends Model
{
    protected $table = 'lo_tecnico_cirujanos';
    protected $fillable = array(
        'id',
                            'lo_CMP',
                            'lo_RNE',
                            
                            'lo_categoria_id'
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
}
