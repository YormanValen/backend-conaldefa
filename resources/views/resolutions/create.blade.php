@extends('layouts.app-master')

@section('content')

<div class="container p-4 d-flex flex-column gap-4">

    <h1>Crear Resolución</h1>

    <form class="d-flex flex-column gap-3" method="POST" action="{{ route('resolutions.store') }}">
        @csrf
        <div class="item_ctn">
            <input type="text" placeholder="Titulo de la resolución" class="form-control" name="title" id="title"
                required>
        </div>
        <div class="item_ctn">
            <textarea class="form-control" placeholder="Descripcion de la resolución"
                aria-label="Descripcion de la resolución" name="content" id="content" required></textarea>
        </div>
        <div class="item_ctn">
            <label for="resolution_date">Fecha de Publicación:</label>
            <input type="date" class="form-control" required name="resolution_date" id="resolution_date">
        </div>


        <button class="btn btn-primary" type="submit">Subir Resolución</button>
    </form>

</div>
@endsection