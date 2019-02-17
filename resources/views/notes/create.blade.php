@extends('layouts.app')

@section('content')
    <script>
        function checkType (active, passive) {
            console.log(active, passive);
            document.getElementById('type-input-'+active).style.display = 'block';
            document.getElementById('type-label-'+active).style.display = 'block';
            document.getElementById('type-input-'+passive).style.display = 'none';
            document.getElementById('type-label-'+passive).style.display = 'none';
        } 
    </script>
    <div class="container-fluid">
        <form action="{{ route('create-note') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row mb-3">
                        <div class="col-md-3 my-auto">
                            Note Name:
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 my-auto">
                            Note Description:
                        </div>
                        <div class="col-md-9">
                            <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 my-auto">
                            Note Category:
                        </div>
                        <div class="col-md-9">
                            <input type="text" list="category" name="category" class="form-control">
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
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active" onclick="checkType('file', 'text')">
                                    <input type="radio" name="type" value="1" autocomplete="off" onclick="checkType('file', 'text')" checked> Softcopy
                                </label>
                                <label class="btn btn-secondary" onclick="checkType('text', 'file')">
                                    <input type="radio" name="type" value="2" autocomplete="off" onclick="checkType('text', 'file')"> Physical
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3" id="softcopy">
                        <div class="col-md-3 my-auto" id="type-label">
                            <p id="type-label-file" class="my-auto">Note File:</p>
                            <p id="type-label-text" class="hidden my-auto">Note Collection Description:</p>
                        </div>
                        <div class="col-md-9">
                            <input type="file" name="note" id="type-input-file" class="form-control">
                            <textarea name="note_text" id="type-input-text" class="form-control hidden" cols="30" rows="5"></textarea>
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
