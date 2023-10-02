<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TE_odontologia extends Model
{
      protected $table = 'TE_odontologia';
    protected $fillable = array(
        'id',
                            'COP',
                            
                            'Evaluador_id',
                            
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
}
