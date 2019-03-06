@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2></h2>
                <div class="row">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="container">
      <!-- Jumbotron Header -->
      <header class="jumbotron my-4 text-center">
        <h1 class="display-4">
        {{ $note->name }}
        </h1>
      </header>
      <!-- Page Features -->
      <div class="row text-center mt-4">
        <div class="col-lg-12 col-md-12 mb-4">
          <p>
          {{ $note->description }} <br>
            @if ($note->type == 1)
                <h1><a href="{{ route('download-note', ['id' => $note->id]) }}">Click here to download the doc</a></h1>
            @else
                <p>{{ $note->note }}</p>
            @endif
          </p>
          
        </div>
      </div>
      <div class="row text-left mt-4">
       @guest
       @else
       <div class="col-lg-10 col-md-10">
        <form action="{{ route('note-comment', ['id' => $note->id]) }}" method="POST">
          @csrf
          <div class="form-group">
            <input
              name="comment"
              class="form-control"
              id="exampleFormControlTextarea1"
              rows="1"
              type="text"
              placeholder="Please add a comment here">
          </div>
        </div>
        <div class="col-lg-2 col-md-2">
          <button
            class="btn btn-outline-warning my-2 my-sm-0 text-dark w-100"
            type="submit"
          >
            Post
          </button>
          </form>
        </div>
       @endguest
        <div class="col-lg-12 col-md-12 mb-4 mx-4">
          <ul class="list-unstyled">
            @foreach ($note->comments as $comment)
              <div class="row">
                  <div class="col-md-12"></div>
              </div>
              <li class="media my-4">
                <div class="media-body">
                  <h6 class="mt-0 mb-1">{{ $comment->user->name }}: {{ $comment->comment }},  {{ $comment->updated_at->diffForHumans() }}</h6>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- /.container -->
