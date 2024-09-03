<?php

namespace App\Imports;

use App\Models\Graduate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Log;


class GraduatesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Log para ver qué datos se están leyendo del Excel
        Log::info('Datos del Excel:', $row);

        Log::info('Claves del Excel:', array_keys($row));


        return Graduate::updateOrCreate(
            [
                'numero' => $row['numero'],
                'fecha_expedicion' => Date::excelToDateTimeObject($row['fecha_expedicion']),
                'nombre' => $row['nombre_y_apellidos'],
                'identificacion' => $row['identificacion'],
                'resolucion' => $row['resolucion'],
                'graduado' => $row['graduado'],
                'correo' => $row['correo'],
                'telefono' => $row['telefono'],
            ]
        );
    }
}
