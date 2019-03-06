@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-5">
        <h1 class="display-4 text-center my-5">Create a Request</h1>
        <form action="{{ route('create-request') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row mb-3">
                        <div class="col-md-3 my-auto">
                            Note Request Name:
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control">
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
                            Note Description:
                        </div>
                        <div class="col-md-9">
                            <textarea name="description" class="form-control" cols="30" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary w-100" type="submit">Save</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>
    </div>
@endsection