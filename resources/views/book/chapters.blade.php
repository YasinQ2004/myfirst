@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Chapters for {{ $book->title }}</h1>
    <a href="{{ route('book.create-chapter', $book->id) }}" class="btn btn-primary mb-3">Add New Chapter</a>

    <ul class="list-group">
        @foreach($chapters as $chapter)
            <li class="list-group-item">
                <strong>{{ $chapter->title }}</strong> (Chapter {{ $chapter->order }})
                <p>{{ \Str::limit($chapter->content, 2) }}</p>
            </li>
        @endforeach
    </ul>
</div>
@endsection
