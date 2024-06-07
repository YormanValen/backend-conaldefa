@extends('layouts.app-master')

@auth
    @section('content')
    <div class="container">
        <h1>Noticias</h1>
        <a href="{{ route('noticias.create') }}" class="btn btn-primary">Crear Nueva Noticia</a>
        <hr>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            @foreach ($noticias as $noticia)
                <div class="col">
                    <div class="noticia_ctn w-50 border p-2 rounded">
                        <h2>{{ $noticia->titulo }}</h2>
                        <p>{{ $noticia->contenido }}</p> 
                        <img src="{{ Storage::url($noticia->imagen) }}" alt="{{ $noticia->titulo }}" class="img-fluid">

                        <p>Publicado: {{ $noticia->fecha_publicacion }}</p>
                        <a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endsection
@endauth