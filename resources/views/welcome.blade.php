@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">
        @foreach($books as $book)
            <div class="col-md-3 mb-4">
                <div class="card bg-dark text-white">
                    <img src="{{ asset('storage/books/' . $book->photo) }}" alt="{{ $book->name }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $book->name }}</h5>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('book.details', $book->id) }}" class="btn btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
