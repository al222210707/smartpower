<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsumptionData;
use Carbon\Carbon;

class GraficsController extends Controller
{
    public function index()
    {
        $consumptiondata = ConsumptionData::all(); // Obtener todos los datos de ConsumptionData

        // Agrupar datos por día y semana
        $consumptionByDay = $consumptiondata->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->format('Y-m-d'); // Agrupar por día
        });

        $consumptionByWeek = $consumptiondata->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->startOfWeek()->format('Y-m-d'); // Agrupar por semana
        });

        // Datos para gráficos de potencia
        $powerLabels = $consumptionByDay->keys()->toArray(); // Etiquetas de días
        $powerConsumptionDayData = $consumptionByDay->map->sum('potencia')->values()->toArray(); // Datos de consumo de potencia por día
        $powerConsumptionWeekData = $consumptionByWeek->map(function ($day) {
            return $day->avg('potencia');
        })->values()->toArray(); // Promedio de consumo de potencia por semana

        // Datos para gráficos de corriente
        $currentLabels = $consumptionByDay->keys()->toArray(); // Etiquetas de días
        $currentConsumptionDayData = $consumptionByDay->map->sum('corriente')->values()->toArray(); // Datos de consumo de corriente por día
        $currentConsumptionWeekData = $consumptionByWeek->map(function ($day) {
            return $day->avg('corriente');
        })->values()->toArray(); // Promedio de consumo de corriente por semana

        return view('grafics', [
            'consumptiondata' => $consumptiondata,
            'powerLabels' => $powerLabels,
            'powerConsumptionDayData' => $powerConsumptionDayData,
            'powerConsumptionWeekData' => $powerConsumptionWeekData,
            'currentLabels' => $currentLabels,
            'currentConsumptionDayData' => $currentConsumptionDayData,
            'currentConsumptionWeekData' => $currentConsumptionWeekData
        ]);
    }
}
