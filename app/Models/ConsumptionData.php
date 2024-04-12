<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumptionData extends Model
{
    use HasFactory;

    protected $table = 'consumptiondata';

    protected $fillable = [
        'id_consumption',
        'potencia',
        'corriente',
        'created_at',
    ];

    // Resto del código del modelo...
}
