@extends('layouts.app')
@section('content')
<div class="container">
<!-- Page Features -->
<div class="row text-center mt-4">
    <!-- TODO:: need to put the button and dropdown under one form and keep style same -->
    <div class="col-lg-6 col-md-6">
      <div class="input-group ">
        <form method="GET" action="/home">
        <label>Choose Subject</label>
        <select class="custom-select" name='category' onchange='this.form.submit()'>
        <option>All</option>
            @foreach($categories as $category)
              <option value="{{$category->id}}"  @if($category->id == Request::get('category')) selected  @endif >{{$category->name}}</option>
            @endforeach
          </select>
        <noscript><input type="submit" value="Submit"></noscript>
        </form>
      </div>
    </div>
  </div>
  <div class="row text-center mt-4">
      @foreach ($notes as $note)
        @include('partials.card', [$note])
      @endforeach
  </div>
      <!-- /.row -->
</div>
@endsection
