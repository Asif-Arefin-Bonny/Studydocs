@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $note->name }}</h2>
                <div class="row">
                    <div class="col-md-8">
                        {{ $note->description }} <br>
                        @if ($note->type == 1)
                            <a href="{{ route('download-note', ['id' => $note->id]) }}">Download</a>
                        @else
                            <p>{{ $note->note }}</p>
                        @endif
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