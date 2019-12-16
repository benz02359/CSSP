@extends('layouts.app')

@section('content')
    <h1>ปัญหา</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
        <div class="card padding p-3">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>{!!substr(strip_tags($post->text), 0, 50) !!}{!! strlen(strip_tags($post->text)) > 50 ? "..." : ""!!}</small>
            <small>{{date('j M Y', strtotime($post->created_at))}}</small>
        </div>            
        @endforeach
        <center>
        {!!$posts->links()!!}
        </center>
    @else
    <p>ไม่มีกระทู้</p>
        
    @endif
    
@endsection