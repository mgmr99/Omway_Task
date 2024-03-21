@extends('layouts.main')
@section('content')
    <div class="container">
        <a href="/">Back</a>
    </div>
    {{ dd($news) }}
    <div class="container">
        <h1>{{ $news->title }}</h1>
        <p>{{ $news->description }}</p>
        <img src="{{ url('/images/' . $news->image) }}" alt="image" style="width: 100px; height: 100px;">
    </div>
@endsection
