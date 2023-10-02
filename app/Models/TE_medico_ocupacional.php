<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TE_medico_ocupacional extends Model
{
      protected $table = 'TE_medico_ocupacional';
    protected $fillable = array(
        'id',
                            'ME_RNE',
                            'MA_CMP',
                            'MA_RNM',
                            'Evaluador_id',
                            
                            
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
}
