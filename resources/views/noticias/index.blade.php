@extends('layouts.app-master')

<head>
    <style>
        .noticias_ctn {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            /* Espacio entre tarjetas */
        }

        /* Estilos para las tarjetas */
        .noticia_card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
            height: 100%;
            /* Hace que las tarjetas ocupen todo el espacio disponible */
        }

        /* Estilos para las imágenes */
        .noticia_card img {
            max-height: 200px;
            /* Ajustar la altura máxima para que las imágenes no rompan el diseño */
            object-fit: cover;
            /* Recorta la imagen si es necesario para que mantenga su proporción */
            margin-bottom: 15px;
        }

        /* Estilo para el contenido y los botones */
        .noticia_card h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .noticia_card p {
            flex-grow: 1;
            /* Hace que el contenido textual ocupe el espacio restante si es necesario */
        }

        .noticia_card .btn {
            margin-top: 10px;
            align-self: flex-start;
        }
    </style>
</head>


@auth
@section('content')
<div class="container">
    <h1>Noticias o eventos</h1>
    <a href="{{ route('noticias.create') }}" class="btn btn-primary">Crear Nueva Noticia</a>
    <hr>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="noticias_ctn">
        @foreach ($noticias as $noticia)
        <div class="noticia_card">
            <h2>{{ $noticia->titulo }}</h2>
            <p>{{ $noticia->contenido }}</p>
            <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}" class="img-fluid">
            <p>Publicado: {{ $noticia->fecha_publicacion }}</p>
            <a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-info">Editar</a>
            <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        @endforeach
    </div>
</div>

@endsection
@endauth