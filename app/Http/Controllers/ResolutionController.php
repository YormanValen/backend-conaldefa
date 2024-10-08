<?php

namespace App\Http\Controllers;

use App\Models\Resolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResolutionController extends Controller
{
    public function index()
    {
        $resolutions = Resolution::all();
        return view('resolutions.index', compact('resolutions'));
    }

    public function create()
    {
        return view('resolutions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'resolution_date' => 'required|date',
            'pdf_file' => 'required|mimes:pdf|max:10000', // Valida el archivo PDF
        ]);

        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $filename, 'public');

            $resolution = new Resolution([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'resolution_date' => $request->get('resolution_date'),
                'pdf_file' => $filePath, // Guardar solo el nombre del archivo
            ]);

            $resolution->save();
        }

        return redirect()->route('resolutions.index')->with('success', 'Resolution created successfully.');
    }


    public function show(Resolution $resolution)
    {
        return view('resolutions.show', compact('resolution'));
    }

    public function edit(Resolution $resolution)
    {
        return view('resolutions.edit', compact('resolution'));
    }

    public function update(Request $request, $id)
    {
        // Validar los campos
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'resolution_date' => 'required|date',
            'pdf_file' => 'nullable|mimes:pdf|max:2048', // Valida que el archivo sea un PDF y no mayor de 2MB
        ]);

        // Buscar la resolución
        $resolution = Resolution::findOrFail($id);

        // Actualizar los datos de la resolución
        $resolution->title = $request->input('title');
        $resolution->content = $request->input('content');
        $resolution->resolution_date = $request->input('resolution_date');

        // Verificar si hay un archivo PDF cargado
        if ($request->hasFile('pdf_file')) {
            // Guardar el nuevo archivo PDF
            $file = $request->file('pdf_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $filename, 'public');

            // Actualizar la ruta del PDF en la base de datos
            $resolution->pdf_file = $filePath;
        }

        // Guardar los cambios
        $resolution->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('resolutions.index')->with('success', 'Resolución actualizada correctamente.');
    }



    public function destroy(Resolution $resolution)
    {
        $resolution->delete();

        return redirect()->route('resolutions.index')->with('success', 'Resolution deleted successfully.');
    }

    public function getResoluciones()
    {
        $resolutions = Resolution::all();
        Log::info('Noticia creada con éxito.' . $resolutions);
        return response()->json($resolutions);
    }

    public function getResolucion($id)
    {
        $resolution = Resolution::findOrFail($id);
        return response()->json($resolution);
    }
}
