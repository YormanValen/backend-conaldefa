@extends('layouts.app-master')
@section('content')

<div class="container mt-5">
    <h2>Importar Egresados desde Excel</h2>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('import.graduates') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Selecciona el archivo Excel:</label>
            <input type="file" name="file" class="form-control" accept=".xls,.xlsx" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Importar Egresados</button>
    </form>
</div>

@endsection