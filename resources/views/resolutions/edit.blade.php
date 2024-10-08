@extends('layouts.app-master')

<head>
    <style>
        /* Estilos para el contenedor principal */


        /* Estilos para el título */
        h1 {
            text-align: center;
            color: #343a40;
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        /* Estilos para los labels */
        label {
            display: block;
            font-weight: bold;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        /* Estilos para los inputs y textarea */
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #fff;
            margin-bottom: 1rem;
            transition: border-color 0.3s ease-in-out;
        }

        /* Cambios en focus para inputs y textarea */
        input[type="text"]:focus,
        input[type="date"]:focus,
        textarea:focus {
            border-color: #80bdff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        /* Estilos para el textarea */
        textarea {
            height: 150px;
            resize: vertical;
        }

        /* Estilos para el botón de submit */
        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        /* Hover para el botón */
        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Espacios entre campos */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .btn_submit {
            width: 15% !important;
            align-self: center !important;
        }

        .alert {
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
  }

  .alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
  }

  .alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
  }

  .alert ul {
    margin: 0;
    padding-left: 20px;
  }
    </style>
</head>


@section('content')
<div class="container p-4 d-flex flex-column gap-4">

    <!-- Mostrar mensaje de éxito -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Mostrar mensaje de error -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1>Editar resolución</h1>

    <form action="{{ route('resolutions.update', $resolution->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" value="{{ $resolution->title }}" required>
        </div>
        <div>
            <label for="content">Contenido</label>
            <textarea name="content" id="content" required>{{ $resolution->content }}</textarea>
        </div>
        <div>
            <label for="resolution_date">Fecha de resolución</label>
            <input type="date" name="resolution_date" id="resolution_date" value="{{ $resolution->resolution_date }}" required>
        </div>
        <!-- Campo para cargar el archivo PDF -->
        <div class="form-group">
            <label for="pdf_file">Subir archivo PDF</label>
            <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf">
        </div>
        <div class="btn_submit_ctn d-flex align-items-center justify-content-center">
            <button class="btn_submit" type="submit">Actualizar</button>
        </div>
    </form>
</div>
@endsection