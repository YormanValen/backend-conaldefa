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
        ]);

        Resolution::create($request->all());

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

    public function update(Request $request, Resolution $resolution)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'resolution_date' => 'required|date',
        ]);

        $resolution->update($request->all());

        return redirect()->route('resolutions.index')->with('success', 'Resolution updated successfully.');
    }

    public function destroy(Resolution $resolution)
    {
        $resolution->delete();

        return redirect()->route('resolutions.index')->with('success', 'Resolution deleted successfully.');
    }

    public function getResoluciones()
    {
        $resolutions = Resolution::all();
        Log::info('Noticia creada con éxito.'. $resolutions);
        return response()->json($resolutions);
    }

    public function getResolucion($id)
    {
        $resolution = Resolution::findOrFail($id);
        return response()->json($resolution);
    }
}
