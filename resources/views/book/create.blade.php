@extends('layouts.admin')

@section('title','Light Novel')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg p-4">
        <h2 class="card-title text-center mb-4">Create New Book</h2>
        <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="6" required></textarea>
            </div>
            
            
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" required>
            </div>
            
            
            <button type="submit" class="btn btn-success w-100">Create</button>

            <div class="mb-3 my-3">
                <a class="btn btn-primary btn-sm form-control" href="{{route('book.index')}}">List</a>
            </div>
        </form>
    </div>
</div>
@endsection
