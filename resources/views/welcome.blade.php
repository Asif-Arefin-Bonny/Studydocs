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
    <a href="register.html" class="btn btn-primary btn-lg">Register Now</a>
  </header>

  <!-- Page Features -->
  <div class="row text-center">
    
    @include('partials.card')
    </div>
  </div>
  <!-- /.row -->
</div>

@endsection
