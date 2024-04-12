<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsumptionData; // Asegúrate de importar el modelo ConsumptionData

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener los registros de ConsumptionData
        $consumptiondata = ConsumptionData::all();

        // Pasar los datos a la vista
        return view('dashboard', compact('consumptiondata'));
    }
}

