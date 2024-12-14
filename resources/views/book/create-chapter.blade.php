@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Create Chapter for "{{ $book->title }}"</h1>

    <div class="card shadow-lg p-4">
        <form action="{{ route('book.store-chapter', $book->id) }}" method="POST">
            @csrf

            <!-- Chapter Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Chapter Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <!-- Chapter Content -->
            <div class="mb-3">
                <label for="content" class="form-label">Chapter Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success w-100">Save Chapter</button>
        </form>
    </div>
</div>
@endsection
