@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ $note->note }}" class="img-fluid">
            </div>
        </div>
    </div>
@endsection