<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function create()
    {
        return view('noticias.create');
    }

    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticias.edit', compact('noticia'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Actualizando datos de entrada:', $request->all());

        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'fecha_publicacion' => 'sometimes|date',
            'imagen' => 'sometimes|image|max:1048',
        ]);

        $noticia = Noticia::findOrFail($id);

        if ($request->hasFile('imagen')) {
            Log::info('imagen:', $request->all());

            // Eliminar la imagen anterior si existe
            if ($noticia->imagen) {
                Storage::delete('public/' . $noticia->imagen);
            }

            // Guardar la nueva imagen
            $path = $request->file('imagen')->store('noticias', 'public');
            $validatedData['imagen'] = $path;
        }

        $noticia->update($validatedData);
        Log::info('actualizando:', $request->all());

        return redirect()->route('noticias.index')->with('status', 'Noticia actualizada con éxito!');
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return redirect()->route('noticias.index')->with('status', 'Noticia eliminada con éxito');
    }

    public function store(Request $request)
    {
        Log::info('Registrando datos de entrada:', $request->all());

        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'fecha_publicacion' => 'sometimes|date',
            'imagen' => 'sometimes|image|max:1048',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('noticias', 'public');
            $validatedData['imagen'] = $path;
        }

        Noticia::create($validatedData);
        Log::info('Noticia creada con éxito.');

        return redirect()->route('noticias.index')->with('status', 'Noticia creada con éxito!');
    }

    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias.index', compact('noticias'));
    }

    public function getNoticias()
    {
        $noticias = Noticia::all()->map(function ($noticia) {
            $noticia->imagen_url = url(Storage::url($noticia->imagen));
            return $noticia;
        });
    
        return response()->json($noticias);
    }
    
    

public function getNoticia($id)
{
    $noticia = Noticia::findOrFail($id);
    $noticia->imagen_url = url(Storage::url($noticia->imagen));
    return response()->json($noticia);
}

}
