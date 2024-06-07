@extends('layouts.app-master')

@section('content')
<div class="container p-4 d-flex flex-column gap-1 ">

    <div class="resolucion_item border p-3 rounded">
        <h1>{{ $resolution->title }}</h1>
        <p>{{ $resolution->content }}</p>
        <p><strong>Fecha:</strong> {{ $resolution->resolution_date }}</p>

        <div class="btn_ctn">
            <a class="btn btn-primary" href="{{ route('resolutions.edit', $resolution->id) }}">Editar</a>

            <form action="{{ route('resolutions.destroy', $resolution->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Borrar</button>
            </form>
        </div>
    </div>
</div>

@endsection