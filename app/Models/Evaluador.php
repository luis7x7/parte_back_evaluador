<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluador extends Model
{
    protected $table = 'Evaluador';
    protected $fillable = array(
                             'id',
                            'apellidos',
                            'nombres',
                            'direccion',
                            'telefono',
                            'email',
                            'imagen_firma',
                            'pos_firma',
                            'Tipo_Especialista_id',
                            'estado_registro'
                        );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at',
         'updated_at',
         'deleted_at'
    ];
    public function Tipo_Especialista(){

        return $this->hasOne(Tipo_Especialista::class, 'Tipo_Especialista_id');
    }
}
