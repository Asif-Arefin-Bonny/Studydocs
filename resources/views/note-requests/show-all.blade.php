@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="display-4 text-center">All Requests</h1>
        @foreach ($requests as $request)
            <div class="border rounded my-4">
                <div class="row m-3">
                    <div class="col-md-3">
                        {{ $request->name }}
                    </div>
                    <div class="col-md-4">
                        {{ $request->user->name }}
                    </div>
                    <div class="col-md-2">
                        {{ $request->category->name }}
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('show-request', ['id' => $request->id]) }}">View Request</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection