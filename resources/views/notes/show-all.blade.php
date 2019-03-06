@extends('layouts.app')
@section('content')
<div class="container">
  <!-- Jumbotron Header -->
  <header class="jumbotron my-4 text-center">
    <h1 class="display-4">
      Welcome to <span class="text-warning">StudyDocs</span>
    </h1>
    <p class="lead">
      Post and find all your necessary study documents here.
    </p>

  @guest
    <a href="/register" class="btn btn-primary btn-lg">Register Now</a>
  @else
    <a href="/home" class="btn btn-primary btn-lg">Home</a>
  @endguest

  </header>

  <!-- Page Features -->
  <div class="row text-center">
    @foreach ($notes as $note)
        @include('partials.card', [$note])
    @endforeach
    <div class="row">
        <div class="col-md-12">
            {{ $notes->links() }}
        </div>
    </div>
    </div>
  </div>
  <!-- /.row -->
</div>

@endsection
