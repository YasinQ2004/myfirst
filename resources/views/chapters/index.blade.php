@extends('layouts.admin')

@section('title','Light Novel')

@section('content')
<div class="container">

    <div class="row">
                  <!-- Success message -->
            @if(session('success'))
                <div>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Contetn</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chapters as $chapter)
                <tr>
                    <td>{{ $chapter->title }}</td>
                    <td><p>{{ $chapter->content }}</p>/td>
                    
                
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@endsection