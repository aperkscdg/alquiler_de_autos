<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    protected $table = 'alquileres';
    protected $primaryKey = 'id_alquiler';
    protected $fillable = ['id_auto', 'id_cliente', 'fecha_inicio', 'fecha_fin'];

    public function auto()
    {
        return $this->belongsTo(Auto::class, 'id_auto', 'id_auto');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }
}
