<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'id_user', 'nombre', 'descripcion',
    ];

    // Relación con el usuario propietario del dispositivo
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relación con los datos de consumo del dispositivo
    public function consumptionData()
    {
        return $this->hasMany(ConsumptionData::class);
    }
}
