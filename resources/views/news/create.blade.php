@extends('layouts.main')
@section('content')
    <div class="container">
        <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email">Category Id:</label>
                <input type="text" class="form-control" name="category_id" id="category_id">
            </div>
            <div class="form-group">
                <label for="news_id">News Id:</label>
                <input type="text" class="form-control" name="news_id" id="news_id">
            </div>
            <div class="form-group">
                <label for="email">Title:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="slug">Slug:</label>
                <textarea class="form-control" name="slug" id="slug"></textarea>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" id="description">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="status">Is_Publish:</label>
                <input type="text" class="form-control" name="is_publish" id="status">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection
