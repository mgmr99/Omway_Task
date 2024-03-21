@extends('layouts.main')
@section('content')
    <div class="container">
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group
            ">
                <label for="email">Category Id:</label>
                <input type="text" class="form-control" name="id" id="category_id" value="{{ $category->id }}">
            </div>
            <div class="form-group">
                <label for="cateogry_name">Category Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection
