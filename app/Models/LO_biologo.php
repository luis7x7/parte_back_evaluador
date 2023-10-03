<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LO_biologo extends Model
{
    protected $table = 'LO_biologo';
    protected $fillable = array(
        'id',
                            'lo_CBP',
                            
                            'lo_categoria_id'
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at','deleted_at'
    ];
}
