@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('edit-note') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $note->id }}">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row mb-3">
                        <div class="col-md-3 my-auto">
                            Note Name:
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control" value="{{ $note->name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 my-auto">
                            Note Description:
                        </div>
                        <div class="col-md-9">
                            <textarea name="description" class="form-control" cols="30" rows="5">{{ $note->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 my-auto">
                            Note Category:
                        </div>
                        <div class="col-md-9">
                            <input type="text" list="category" name="category" value="{{ App\Category::find($note->category_id)->name }}" class="form-control">
                        </div>
                        <datalist id="category">
                            @foreach (App\Category::all() as $category)
                                <option value="{{ $category->name }}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 my-auto">
                            Note Type:
                        </div>
                        <div class="col-md-9">
                            <p>{{ $note->type == 1 ? 'Softcopy' : 'Physical' }}</p>
                        </div>
                    </div>
                    <div class="row mb-3" id="softcopy">
                        <div class="col-md-3 my-auto" id="type-label">
                            @if ($note->type == 1)
                                <p id="type-label-file" class="my-auto">Note File:</p>
                            @else
                                <p id="type-label-text" class="my-auto">Note Collection Description:</p>
                            @endif
                        </div>
                        <div class="col-md-9">
                            @if ($note->type == 1)
                                <input type="file" name="note" id="type-input-file" class="form-control">
                            @else
                                <textarea name="note_text" id="type-input-text" class="form-control" cols="30" rows="5">{{ $note->note }}</textarea>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>
    </div>
@endsection