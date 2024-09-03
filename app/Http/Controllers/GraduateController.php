<?php

namespace App\Http\Controllers;

use App\Imports\GraduatesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class GraduateController extends Controller
{
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
