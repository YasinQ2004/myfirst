@extends('layouts.admin')

@section('title', 'Light Novel')

@section('content')
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    
    <div class="row mb-4">
        <div class="col-md-12 text-right">
            <a href="{{ route('book.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus-circle"></i> Add New</a>
        </div>
    </div>

  
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td class="text-center">{{ $book->name }}</td>
                                <td class="text-center">
                                    @if($book->photo)
                                        <img src="{{ asset('storage/books/' . $book->photo) }}" alt="{{ $book->name }}" class="img-fluid" style="max-width: 100px;">
                                    @else
                                        <p class="text-muted">No image available</p>
                                    @endif
                                </td>
                                <td class="text-center">{{ $book->description }}</td>
                                <td class="text-center">
                                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('book.addChapter', $book->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus"></i> Add Chapter
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

