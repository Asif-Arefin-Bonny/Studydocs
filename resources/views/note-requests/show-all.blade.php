@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach ($requests as $request)
            <div class="row">
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
        @endforeach
        <div class="row">
            <div class="col-md-12">
                {{ $requests->links() }}
            </div>
        </div>
    </div>
@endsection