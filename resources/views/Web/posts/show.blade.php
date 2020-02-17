@extends('layouts.app')
   <!-- title unixdev -->
   <title>กระทู้:{{$post->title}} </title>
    <!-- add icon link -->
    <link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<style>

.card {
  background: white;
  margin: 30px auto 20px auto;
  border-radius: 12px;
  box-sizing: border-box;
  max-width: 1550px;
  max-height: null;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.thumbnail {
  background-color: #D18B49;
  padding: 5px 10px 0 10px;
  margin: 0 0  10px 0;
  border-radius: 12px 12px 0px 0px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.card-comment {
  background: white;
  margin: 0px 0 20px 70px;
  border-radius: 12px;
  box-sizing: border-box;
  max-width: 1550px;
  max-height: null;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.thumbnail-comment  {
  background-color: #A5AAAE;
  color: #FFF; 
  padding: 0px 10px 0 10px;
  margin: 0 0  10px 0;
  border-radius: 12px 12px 0px 0px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.thumbnail-count {
  background-color: #848484;
  color: #FFF; 
  padding: 3px 10px 1px 55px;
  margin: 0 0  10px 0;
  border-radius: 12px 12px 12px 12px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.title {
  margin-top: -150px;
  padding: 5px 5px -5px 5px;

  color: #FFF;
  font-size: 28px;
  margin-top: 2px;
  

}
.description {
  margin: 0 0 (gutters * 2);
}

.comment{
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}
</style>

<a href="/posts" class="btn btn-outline-secondary">ย้อนกลับ</a>

<div class="row">
    <div class="card" style="width:1200px">
      <div class="products">
        <div class="thumbnail"><p class="title"> {{$post->title}} </p></div>
          <h2 class="card-title pricing-card-title" style="padding:5px 0 0 25px">
                <small>{!!$post->text!!}</small></h2>
            <div class="footer row">    
                <ul class="list-unstyled mt-8 mb-8 text-muted" style="padding:35px 0 0 15px">
                    <li> &nbsp; โพสต์เมื่อวันที่ {{date('j/n/Y H:i', strtotime($post->created_at))}}  &nbsp;  &nbsp; โดย {{$post->user['name']}}, บริษัท {{$post->user->company['name']}} โปรแกรม {{$post->program['name']}}</li>
                    </ul>
                    <div class="col-5" style="padding:25px 0 0 15px">


                    @if(!Auth::guest())
                    @if(Auth::user()->id == $post->user_id or Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
                        
            
                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'class' => 'float-right', 'style' => 'style="padding:2px 15px 2px 15px"', 'method' => 'DELETE', 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('ลบกระทู้', ['class' => 'btn btn-danger bt'])}}
                        {!!Form::close()!!}

                        <a href="/posts/{{$post->id}}/edit" class="btn btn-warning float-right" style="padding:7px 15px 6px 15px">แก้ไข</a>
                    @endif
                @endif
            </div>
        </div>
      </div>
    </div>
 <!-------------------------------------------------------------------------------
<div class="card border-warning toppost">
  <div class="card-header border-warning" style="color:#FFF;background-color:#db851c"><h3>{{$post->title}}</h3></div>
  <div class="card-body"style="color:#cc7300;height:90px;">
    <h5 class="card-text">{!!$post->text!!}</h5>
  </div>
  <div class="card-footer border-warning" style="color:#FFF;background-color:#db851c">
  <div class="row">
        <div class="col-9 row">
        &nbsp; โพสต์เมื่อวันที่ {{date('j/n/Y H:i', strtotime($post->created_at))}}  &nbsp;  &nbsp;<h5> <b> โดย</b> {{$post->user['name']}}. <b>บริษัท</b> {{$post->user->company['name']}} <b>โปรแกรม</b> {{$post->program['name']}} </h5>
        </div>
        <div class="col-3">


    @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id or Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
            

             {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'class' => 'float-right', 'style' => 'style="padding:2px 15px 2px 15px"', 'method' => 'DELETE', 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('ลบกระทู้', ['class' => 'btn btn-danger bt'])}}
            {!!Form::close()!!}

            <a href="/posts/{{$post->id}}/edit" class="btn btn-warning float-right" style="padding:2px 15px 2px 15px">แก้ไข</a>
        @endif
    @endif
    </div>
</div>
</div>

-->
</div>
    @if(count($comments) > 0)
    <p hidden>{{$count = 1}}</p>
    <div class="thumbnail-count" style="width:350px"><h4>มีความคิดเห็น  {{ count($comments) }} ความคิดเห็น</div></h4>
    @foreach ($comments as $c)
   <!-- <div class="card border-secondary comment" style="max-width: 68rem; ">
        <div class="card-header text-white  bg-secondary  border-secondary" style="height:44px;margin-top:-6px;font-size:18px"> -->
    <div class="card card-comment" style="width:1050px">
      <div class="products">
        <div class="thumbnail-comment"><h4>{{Form::label('text', 'ความคิดเห็นที่')}}{{ $count }}</div></h4>
        <p hidden>{{$count++}}</p> 
            <div class="card-body"  style="height:50px;">
                <p class="card-text" style="margin-top:-22px">{!! $c->text !!}</p>
            </div>
        <div class="card-footer">โพสต์เมื่อวันที่ {{date('j/n/Y H:i', strtotime($c->created_at))}}  &nbsp;  &nbsp; <b> โดย</b> {{$c->user['name']}}</div>
    </div>
    </div>

    @endforeach
    @endif
    <h3 style="margin-bottom: -20px;margin-top:30px">แสดงความคิดเห็น</h3>
    <div class="card">    
    <div class="form-group">
        {!!Form::open(['action' => 'CommentController@store', 'method' => 'POST'])!!}
             @if(Auth::user()->id == $post->user_id or Auth::user()->role_id == 1 or Auth::user()->role_id == 2)
            {{Form::textarea('text', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'ใส่ข้อความที่ต้องการ'])}}
            @else
            {{Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'ใส่ข้อความที่ต้องการ'])}}
            @endif
        {!!Form::close()!!}
        </div></div>
    <div class="col-12" style="margin-left:550px">
        {{Form::submit('โพสต์',['class' => 'btn btn-primary'])}}
            <input id="user_id" type="hidden" name="user_id" value="{{Auth::user()->name}}">
            <input id="post_id" type="hidden" name="post_id" value="{{$post->id}}">
    </div>
    {!!Form::close()!!}
@endsection