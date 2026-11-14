<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $table = 'autos';
    protected $primaryKey = 'id_auto';
    protected $fillable = ['modelo', 'marca', 'precio', 'estado'];

    public function alquileres()
    {
        return $this->hasMany(alquiler::class, 'id_auto', 'id_auto');
    }
}

?>
