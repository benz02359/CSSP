@extends('layouts.app')

@section('content')
    <h1>ปัญหา</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
        @if(Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
        <div class="card padding p-3">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>{!!substr(strip_tags($post->text), 0, 50) !!}{!! strlen(strip_tags($post->text)) > 50 ? "..." : ""!!}</small>
            <small>{{date('j M Y', strtotime($post->created_at))}}</small>
        </div> 
        @elseif ($usercom == $post->user->company)
        <div class="card padding p-3">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>{!!substr(strip_tags($post->text), 0, 50) !!}{!! strlen(strip_tags($post->text)) > 50 ? "..." : ""!!}</small>
            <small>{{date('j M Y', strtotime($post->created_at))}}</small>
        </div> 
        @endif           
        @endforeach
        <center>
        {!!$posts->links()!!}
        </center>
    @else
    <p>ไม่มีกระทู้</p>
        
    @endif
    
@endsection