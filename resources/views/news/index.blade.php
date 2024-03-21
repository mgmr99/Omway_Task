@extends('layouts.main')
@section('content')
    <div class="container">
        <form action="{{ route('news.search') }}" method="get">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-primary">Search News</button>
        </form>
    </div>
    <div class="container">
        <a href="/news/create">Create</a>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Category Id</th>
                    <th>News Id</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Is_Publish</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $new)
                    <tr>
                        <td>{{ $new->category_id }}</td>
                        <td>{{ $new->id }}</td>
                        <td>{{ $new->title }}</td>
                        <td>{{ $new->slug }}</td>
                        <td>{{ $new->date }}</td>
                        <td>{{ $new->description }}</td>
                        <td><img src="{{ url('/images/' . $new->image) }}" alt="image"
                                style="width: 100px; height: 100px;">
                        </td>
                        <td>{{ $new->is_publish }}</td>

                        <td>
                            @if ($new->is_publish == 1)
                                <a href="{{ route('news.unpublish', $new->id) }}">Unpublish</a>
                            @else
                                <a href="{{ route('news.publish', $new->id) }}">Publish</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('news.edit', $new->id) }}">Edit</a>
                            <form action="{{ route('news.destroy', $new->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn-del" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        //use this script to confirm before delete  for button with class btn-del
        $(document).ready(function() {
            $('.btn-del').on('click', function(e) {
                if (!confirm('Are you sure you want to delete?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection
