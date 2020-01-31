@extends('layouts.app')

@section('content')
<style>
.toppost{
    margin: 15px 0px 15px 0px;
}
.bt{
    padding:2px 11px 2px 11px;
    margin-left: 10px;
    margin-right: -20px
}
.comment{
    margin: 15px 0px 15px 35px;
}
</style>


<a href="/posts" class="btn btn-outline-warning">ย้อนกลับ</a>
<div class="card border-warning toppost">
  <div class="card-header border-warning" style="color:#FFF;background-color:#db851c"><h3>{{$post->title}}</h3></div>
  <div class="card-body"style="color:#cc7300;height:90px;">
    <h5 class="card-text">{!!$post->text!!}</h5>
  </div>
  <div class="card-footer border-warning" style="color:#FFF;background-color:#db851c">
  <div class="row">
        <div class="col-9 row">
        &nbsp; โพสต์เมื่อวันที่ {{date('j/n/Y H:i', strtotime($post->created_at))}}  &nbsp;  &nbsp;<h5> <b> โดย</b> {{$post->user['name']}}. <b>บริษัท</b> {{$post->user->company['name']}} </h5>
        </div>
        <div class="col-3">
    @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id or Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right', 'style' => 'style="padding:2px 15px 2px 15px"'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('ลบกระทู้', ['class' => 'btn btn-danger bt'])}}
            {!!Form::close()!!}
            <a href="/posts/{{$post->id}}/edit" class="btn btn-warning float-right" style="padding:2px 15px 2px 15px">แก้ไข</a>
        @endif
    @endif
    </div>
</div>
</div>
</div>

    
    @if(count($comments) > 0)
    <p hidden>{{$count = 1}}</p>
    @foreach ($comments as $c)
    <div class="card border-secondary comment" style="max-width: 68rem; ">
        <div class="card-header text-white  bg-secondary  border-secondary" style="height:44px;margin-top:-6px;font-size:18px">{{Form::label('text', 'ความคิดเห็นที่')}}{{ $count }}</div>
        <p hidden>{{$count++}}</p> 
            <div class="card-body"  style="height:50px;">
                <p class="card-text" style="margin-top:-22px">{!! $c->text !!}</p>
            </div>
        <div class="card-footer text-white  bg-secondary  border-secondary">โพสต์เมื่อวันที่ {{date('j/n/Y H:i', strtotime($c->created_at))}}  &nbsp;  &nbsp; <b> โดย</b> {{$c->user['name']}}</div>
    </div>




    @endforeach
    @endif
    <br>
    <h4>แสดงความคิดเห็น</h4>
    <div class="card">    
    <div class="form-group">
        {!!Form::open(['action' => 'CommentController@store', 'method' => 'POST'])!!}
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