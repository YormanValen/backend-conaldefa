@extends('layouts.app-master')

@section('content')
<div class="container p-4 d-flex flex-column gap-2 align-items-start">

    <h1>Resoluciones</h1>
    <a class="btn btn-primary" href="{{ route('resolutions.create') }}">Create New Resolution</a>
    <div class="resoluciones_ctn border w-100 p-2 rounded">
        <ul class="m-0">
            @foreach ($resolutions as $resolution)
                <li>
                    <a href="{{ route('resolutions.show', $resolution->id) }}">{{ $resolution->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection