@extends('layouts.app')
@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}
    
@endsection

@section('content')
<a href="/posts/{{$post->id}}" class="btn btn-primary">กลับ</a>
    <h1>แก้ไขกระทู้</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {{Form::label('title', 'หัวข้อ')}}
            {{Form::text('title',$post->title,['class' => 'form-control','placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
                {{Form::label('body', 'ข้อความ')}}
                {{Form::textarea('body', $post->text, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
        
            {{ Form::label('category_id', "Category:", ['class' => 'form-spacing-top']) }}
            {!! Form::select('category_id', $cate, $post->category_id, ['class' => 'form-control']) !!}

            {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
			{{ Form::select('tags[]', $tags, $post->tag_id, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
            
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('บันทึก',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}    
@endsection

@section('scripts')

{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
</script>

@endsection