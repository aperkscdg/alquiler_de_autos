<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $fillable = ['nombre', 'apellido', 'dni', 'email', 'telefono'];

    public function alquileres()
    {
        return $this->hasMany(Alquiler::class, 'id_cliente', 'id_cliente');
    }
}

?>