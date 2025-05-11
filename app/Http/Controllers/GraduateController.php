<?php

namespace App\Http\Controllers;

use App\Imports\GraduatesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use App\Models\Graduate;

class GraduateController extends Controller
{

    // Método para buscar un graduado por cédula
    public function searchByCedula(Request $request)
    {
        // Validar que la cédula sea proporcionada
        $request->validate([
            'cedula' => 'required|string'
        ]);

        // Buscar el graduado por cédula
        $graduate = Graduate::where('cedula', $request->cedula)->first();

        // Verificar si se encontró
        if ($graduate) {
            return response()->json([
                'nombre' => $graduate->nombre_y_apellidos,
                'matriculado' => $graduate->matriculado,
                'colegiado' => $graduate->colegiado,
                'graduado' => $graduate->graduado,
                'vigencia' => $graduate->vigencia,
                'antecedentes' => $graduate->antecedentes,
                'colegiado' => $graduate->colegiado,
                'created_at' => $graduate->created_at,
                'updated_at' => $graduate->updated_at,
            ]);
        } else {
            // Si no se encuentra el graduado, devolver un error
            return response()->json([
                'message' => 'Graduado no encontrado',
            ], 404);
        }
    }

    public function importGraduates(Request $request)
    {
        Log::info('Importación de egresados iniciada.');

        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Log::info('Validación de archivo pasada.', ['file_name' => $request->file('file')->getClientOriginalName()]);

        try {
            Excel::import(new GraduatesImport, $request->file('file'));
            Log::info('Importación de egresados completada.');
        } catch (\Exception $e) {
            Log::error('Error durante la importación de egresados.', ['error' => $e->getMessage()]);
            return back()->with('error', 'Hubo un problema al importar los egresados.');
        }

        return back()->with('success', 'Egresados importados exitosamente.');
    }
}
