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
                'numero' => $row['numero_tarjeta'],
                'fecha_expedicion' => Date::excelToDateTimeObject($row['fecha_de_expedicion']),
                'nombre' => $row['nombre'],
                'identificacion' => $row['cedula'],
                'resolucion' => $row['resolucion'],
                'universidad' => $row['universidad'],
                'correo' => $row['correo'],
                'telefono' => $row['telefono'],
                'fecha_pago_realizado' => isset($row['fecha_pago_realizado']) && is_numeric($row['fecha_pago_realizado'])
                    ? Date::excelToDateTimeObject($row['fecha_pago_realizado'])
                    : null,
                'verificado' => $this->convertToBoolean($row['verificado']),
                'valor' => $row['valor'],
                'recibido_tarjeta' => $this->convertToBoolean($row['recibido_de_tarjeta']),
                'colegiado' => $this->convertToBoolean($row['colegiado']),
                'matriculado' => $this->convertToBoolean($row['matriculado']),
                'acta_grado' => $this->convertToBoolean($row['acta_de_grado']),
                'acta_afiliacion' => $this->convertToBoolean($row['acta_de_afiliacion']),
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
