@extends('layouts.app-master')

@section('content')
<div class="container p-4 d-flex flex-column gap-4">

    <h1>Edit Resolution</h1>

    <form action="{{ route('resolutions.update', $resolution->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $resolution->title }}" required>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" required>{{ $resolution->content }}</textarea>
        </div>
        <div>
            <label for="resolution_date">Resolution Date</label>
            <input type="date" name="resolution_date" id="resolution_date" value="{{ $resolution->resolution_date }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
    </div>
@endsection
