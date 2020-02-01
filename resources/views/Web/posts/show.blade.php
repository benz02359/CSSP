@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-primary">กลับ</a>
<hr>
    <h1>{{$post->title}}</h1>
    <hr>
    <div class="tags">โปรแกรม: <b>{{$post->program['name']}}</b>
                     
           
    <small><span style="background-color: chartreuse" class="label label-default"></span></small>
           
        </div>
<hr>
    <div class="card-body">
        {!!$post->text!!}
    </div>

    <hr>
{{date('j M Y', strtotime($post->created_at))}} <b>โดย</b> {{$post->user['name']}}. <b>บริษัท</b> {{$post->user->company['name']}}
    <hr>
    @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id or Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">แก้ไข</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('ลบกระทู้', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            <hr>
        @endif
    @endif
    
    @if(count($comments) > 0)
    <p hidden>{{$count = 1}}</p>
    @foreach ($comments as $c)
        <div class="card"> 
            <div class="form-group">
                     {{Form::label('text', 'ความคิดเห็นที่')}}{{ $count }}
                
                     <p hidden>{{$count++}}</p>
                  <p>  {!! $c->text !!}</p>
                  {{$c->user['name']}} {{date('j M Y', strtotime($c->created_at))}}
                </div>
            </div> 
        
        
            <hr>
    @endforeach
    @endif
    <div class="card">    
    <div class="form-group">
        {!!Form::open(['action' => 'CommentController@store', 'method' => 'POST'])!!}
            {{Form::label('text', 'แสดงความคิดเห็น')}}
            @if(Auth::user()->id == $post->user_id or Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
            {{Form::textarea('text', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'ใส่ข้อความที่ต้องการ'])}}
            @else
            {{Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'ใส่ข้อความที่ต้องการ'])}}
            @endif
            {{Form::submit('ส่งข้อความ',['class' => 'btn btn-primary'])}}

            <input id="user_id" type="hidden" name="user_id" value="{{Auth::user()->name}}">
            <input id="post_id" type="hidden" name="post_id" value="{{$post->id}}">
        {!!Form::close()!!}
        </div>
    </div>
@endsection