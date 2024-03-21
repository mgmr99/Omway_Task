@extends('layouts.main')
@section('content')
    <div class="container">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Category Id:</label>
                <input type="text" class="form-control" name="id" id="category_id">
            </div>
            <div class="form-group">
                <label for="cateogry_name">Category Name:</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection
