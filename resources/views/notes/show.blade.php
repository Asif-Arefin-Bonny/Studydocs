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
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($note->comments as $comment)
                                    <div class="row">
                                        <div class="col-md-12">{{ $comment->comment }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <form action="{{ route('note-comment', ['id' => $note->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="comment" class="form-control">
                                </div>
                            </div>
                        </form>
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
        <div class="col-lg-10 col-md-10">
          <div class="form-group">
            <textarea
              class="form-control"
              id="exampleFormControlTextarea1"
              rows="1"
              placeholder="Comment here"
            ></textarea>
          </div>
        </div>
        <div class="col-lg-2 col-md-2">
          <button
            class="btn btn-outline-warning my-2 my-sm-0 text-dark w-100"
            type="submit"
          >
            Post
          </button>
        </div>
        <div class="col-lg-12 col-md-12 mb-4 mx-4">
          <ul class="list-unstyled">
            <li class="media">
              <div class="media-body">
                <h6 class="mt-0 mb-1">Comment 1</h6>
              </div>
            </li>
            <li class="media my-4">
              <div class="media-body">
                <h6 class="mt-0 mb-1">Comment 2</h6>
              </div>
            </li>
            <li class="media">
              <div class="media-body">
                <h6 class="mt-0 mb-1">Comment 3</h6>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- /.container -->
