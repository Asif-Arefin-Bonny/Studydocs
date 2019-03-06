@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <h2 class="text-center">{{ $req->name }}</h2>
                <p class="my-5 font-weight-bold">{{ $req->description }}</p>
                <div class="row my-5">
                    <div class="col-md-6">
                        Category: {{ $req->category->name }}
                    </div>
                    <div class="col-md-6 text-right font-weight-bold">
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
                <input type="text" name="comment" class="form-control mb-2" placeholder="write a comment here..">
                <button type="submit" class="btn btn-outline-warning text-dark">Save</button>
            </form>
            @endguest
                <h4 class="text-left pt-5">Comments</h4>
                @foreach ($req->comments as $comment)
                    <div class="row">
                        <div class="col-md-12">
                        <h6>{{ $comment->user->name }}: {{ $comment->comment }}, {{ $comment->created_at->diffForHumans() }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection