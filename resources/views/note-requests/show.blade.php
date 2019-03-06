@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <h2 class="text-center">{{ $req->name }}</h2>
                <p>{{ $req->description }}</p>
                <div class="row">
                    <div class="col-md-6">
                        Category: {{ $req->category->name }}
                    </div>
                    <div class="col-md-6 text-right">
                        Requested By: {{ $req->user->name }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
            @guest
            @else
            <form action="{{ route('request-comment', ['id' => $req->id]) }}" method="POST">
                @csrf
                <input type="text" name="comment" class="form-control" placeholder="write a comment here.."><br>
                <button type="submit" class="btn btn-outline-warning">Save</button>
            </form>
            @endguest
                <h5 class="text-center">Comments</h5>
                @foreach ($req->comments as $comment)
                    <div class="row">
                        <div class="col-md-12">
                        {{ $comment->user->name }}: {{ $comment->comment }}, {{ $comment->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection