@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
        <div class="card padding p-3">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written on {{$post->created_at}} {{$post->user->name}}</small>
        </div>            
        @endforeach
        {{$posts->links()}}
    @else
    <p>No Posts</p>
        
    @endif
    
@endsection