@extends('layouts.app-master')
@auth
@section('content')
<div class="container p-4 d-flex flex-column gap-4">
    <h1>Creacion de noticia o evento </h1>
    <form class="d-flex flex-column gap-3" method="POST" action="{{ route('noticias.store') }}"
        enctype="multipart/form-data">
        @csrf

        <div class="item_ctn">
            <input type="text" placeholder="Titulo de la noticia" class="form-control" name="titulo" id="titulo"
                required>
        </div>
        <div class="item_ctn">
            <textarea class="form-control" placeholder="Descripcion de la noticia"
                aria-label="Descripcion de la noticia" name="contenido" id="contenido" required></textarea>
        </div>
        <div class="item_ctn">
            <label for="fecha_publicacion">Fecha de Publicación:</label>
            <input type="date" class="form-control" name="fecha_publicacion" id="fecha_publicacion">
        </div>

        <div class="item_ctn">
            <input type="file" name="imagen" id="imagen">
        </div>
        <button class="btn btn-primary" type="submit">Subir publicación</button>
    </form>
</div>
@endsection
@endauth