@extends('layouts.app-master')

@auth
@section('content')

<div class="container p-3">
    <h2>Editar Noticia</h2>
    <form class="d-flex flex-column gap-3" enctype="multipart/form-data" action="{{ route('noticias.update', $noticia->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Título:</label>

            <input type="text" class="form-control" name="titulo" value="{{ $noticia->titulo }}" required>
        </div>
        <div class="form-group">
            <label for="contenido">Contenido:</label>
            <textarea class="form-control" name="contenido" required>{{ $noticia->contenido }}</textarea>
        </div>
        <div class="form-group">
            <label for="fecha_publicacion">Fecha de Publicación:</label>
            <input type="date" class="form-control" name="fecha_publicacion" value="{{ $noticia->fecha_publicacion }}">
        </div>

        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" class="form-control" name="imagen" id="imagen">
            @if($noticia->imagen)
                <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="Imagen actual" style="max-width: 100px; margin-top: 10px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('noticias.index') }}" class="btn btn-danger">Cancelar</a>

    </form>
</div>
@endsection
@endauth