@extends('layouts.app')
@section('content')
<div class="container">
<!-- Page Features -->
<div class="row text-center mt-4">
    <!-- TODO:: need to put the button and dropdown under one form and keep style same -->
    <div class="col-lg-6 col-md-6">
      <div class="input-group ">http://127.0.0.1:8000/home
        <select class="custom-select" id="inputGroupSelect01">
          <option selected>Choose Subject</option>
          <option value="1">Web</option>
          <option value="2">Cloud</option>
          <option value="3">Data Structure</option>
        </select>
      </div>
    </div>
    <div class="col-lg-6 col-md-6">
      <form class="form-inline">
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="Search Docs"
          aria-label="Search"
        />
        <button
          class="btn btn-outline-warning my-2 my-sm-0 text-dark"
          type="submit"
        >
          Search
        </button>
      </form>
    </div>
  </div>
  <div class="row text-center mt-4">
    @include('partials.card')
  </div>
      <!-- /.row -->
</div>
@endsection
