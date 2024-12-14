@extends('layouts.app')

@section('title', 'Light Novel')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3 mb-4">
            <!-- Book Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Book Photo -->
                    @if($book->photo)
                        <img src="{{ asset('storage/books/' . $book->photo) }}" alt="{{ $book->name }}" class="img-fluid" style="height: 300px; object-fit: cover;">
                    @else
                        <p class="text-muted">No image available</p>
                    @endif
                </div>
            </div>

            <!-- Book Name -->
            <div class="card-body">
                @if($book->name)
                    <h5 class="card-title text-center">{{ $book->name }}</h5>
                @else
                    <p class="text-muted">No name available</p>
                @endif
            </div>

            <!-- Book Description -->
            <div class="card-body">
                @if($book->description)
                    <p class="card-text">{{ $book->description }}</p>
                @else
                    <p class="text-muted">No description available</p>
                @endif
            </div>
        </div>

        <!-- Chapters List -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Chapters</h5>
                    @if($book->chapters->count() > 0)
                        <ul class="list-group">
                            @foreach($book->chapters as $chapter)
                                <li class="list-group-item">
                                    <a href="{{ route('book.showchap', $chapter->id) }}">
                                        {{ $chapter->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No chapters available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
