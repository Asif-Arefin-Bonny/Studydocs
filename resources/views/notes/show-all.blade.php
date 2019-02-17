@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach ($notes as $note)
            <div class="row">
                <div class="col-md-3">
                    {{ $note->name }}
                </div>
                <div class="col-md-4">
                    {{ $note->description }}
                </div>
                <div class="col-md-2">
                    {{ $note->category->name }}
                </div>
                <div class="col-md-3">
                    <a href="{{ route('show-note', ['id' => $note->id]) }}">View Note</a>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-md-12">
                {{ $notes->links() }}
            </div>
        </div>
    </div>
@endsection