@extends('layouts.app')

@section('title', 'Chapter: ' . $chapter->name)

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <!-- Chapter Title -->
            <div class="card">
                <div class="card-body">
                    <h3>{{ $chapter->title }}</h3>
                </div>
            </div>

            <!-- Chapter Content -->
            <div class="card mt-5">
                <div class="card-body">
                    <h5>Content</h5>
                    <p>{{ $chapter->content }}</p> <!-- Assuming 'content' is the column storing chapter content -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
