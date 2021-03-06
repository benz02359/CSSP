@extends('layouts.app')
@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}
    
@endsection

@section('content')
<a href="/posts/{{$post->id}}" class="btn btn-outline-warning" style="margin:-10px 0px 20px 0px">ย้อนกลับ</a>
    <h1>แก้ไขกระทู้</h1>
    <div class="col-md-11 col-md-offset-3">
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {{Form::label('title', 'หัวข้อ')}}
            {{Form::text('title',$post->title,['class' => 'form-control','placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('body', 'ข้อความ')}}
                {{Form::textarea('body', $post->text, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
        
            <div class="row"  style="margin-left:10px;">
                {{ Form::label('pro_id', 'โปรแกรม:') }}
                <div >
                        <select class="form-control" name="pro_id" id="pro_id">
                            @foreach($program as $p)
                                <option name="pro_id" id="pro_id" value="{{$post->program['id']}}" selected>@if(isset($post->program['id'])){{ $p->name }}@else @endif</option>
                                <option name="pro_id" id="pro_id" value="{{$p->id}}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>    
                </div>

            <!--{{ Form::label('category_id', "จัดหมวดหมู่", ['class' => 'form-spacing-top']) }}
            {!! Form::select('category_id', $cate, $post->category_id, ['class' => 'form-control']) !!}
            -->
           
            <br>  <br>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('บันทึกกระทู้',['class' => 'btn btn-outline-success'])}}
    {!! Form::close() !!} 
    </div>  
@endsection

@section('scripts')

{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
</script>

@endsection