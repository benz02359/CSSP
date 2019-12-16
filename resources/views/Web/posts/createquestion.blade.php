@extends('layouts.app')
@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}
    
@endsection

@section('content')
<div class="row">
		<div class="col-md-12">
    <h1>สร้างกระทู้คำถาม</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'หัวข้อคำถาม')}}
            {{Form::text('title','',['class' => 'form-control','placeholder' => 'ใส่หัวข้อที่ต้องการ'])}}
        </div>
        <div class="form-group">
            {{Form::label('text', 'ข้อความ')}}
            {{Form::textarea('text', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'ใส่ข้อความที่ต้องการ'])}}
        </div>
        <!--<div class="form-group">
            {{Form::label('catagory', 'หมวดหมู่')}}
            <table class="table table-bordered">
            @foreach ($categories as $cate)        
            <td>
            {{Form::label('catagory', $cate->name)}}
            {{Form::radio('catagory', $cate->id)}}
            </td>
            @endforeach
            </table>
        </div>-->
        <div class="row">
        {{ Form::label('category_id', 'Category:') }}
        <div >
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
						<option value='{{ $category->id }}'>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>    
        </div>
        <hr>
        <input id="posttype_id" type="hidden" name="posttype_id" value="{{1}}">
        {{ Form::label('tags', 'Tags:') }}
		
                
        {!! Form::select('dep', $tags, $tags, ['class' => 'form-control select2-multi','name' => 'tags[]','multiple' => 'multiple']) !!} 


        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
        
    {!! Form::close() !!}   
</div>
</div> 
@endsection

@section('scripts')

{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
    $('.select2-multi').select2();
</script>
    
@endsection