<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TE_licenciado_psicologia extends Model
{
      protected $table = 'TE_licenciado_psicologia';
    protected $fillable = array(
        'id',
                            'CPsP',
                            'Evaluador_id',
                            
                            
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
}
