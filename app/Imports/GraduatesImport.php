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

        // Verificar si el campo cédula está vacío
        if (empty($row['cedula']) || empty($row['nombre_y_apellidos'])) {
            return null; // Omitir esta fila
        }

        // Limpiar la cédula eliminando las comas
        $cedulaSinComas = str_replace(',', '', $row['cedula']);

        // Verificar si la fecha es válida antes de convertirla
        $fechaExpedicion = is_numeric($row['fecha_expedicion']) ? Date::excelToDateTimeObject($row['fecha_expedicion']) : null;
        $vigencia = is_numeric($row['vigencia']) ? Date::excelToDateTimeObject($row['vigencia']) : null;

        return Graduate::updateOrCreate(
            ['cedula' => $cedulaSinComas], 
            [
                'numero' => $row['numero'],
                'fecha_expedicion' => $fechaExpedicion,
                'nombre_y_apellidos' => $row['nombre_y_apellidos'],
                'graduado' => $row['graduado'],
                'matriculado' => $this->convertToBoolean($row['matriculado']),
                'colegiado' => $this->convertToBoolean($row['colegiado']),
                'vigencia' => $vigencia,
                'antecedentes' => $row['antecedentes'],
            ]
        );
        
    }



    /**
     * Convierte 'x' en true y cualquier otro valor en false.
     */
    private function convertToBoolean($value)
    {
        return strtolower(trim($value)) === 'x';
    }
}
