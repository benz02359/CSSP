@extends('layouts.app')
@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}
    
@endsection

@section('content')
<div class="row">
		<div class="col-md-12">
    <h2>สร้างกระทู้ข่าว</h2>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'หัวข้อข่าว')}}
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
        <div class="row" style="margin-left:10px;">
        {{ Form::label('pro_id', 'โปรแกรม:') }}
        <div >
        <select class="form-control" name="pro_id">
					@foreach($program as $p)
						<option value="{{$p->id}}">{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>    
        </div>
        <input id="posttype_id" type="hidden" name="posttype_id" value="{{2}}">

        <div style="margin-left:500px;">
        {{Form::submit('โพสต์ข่าว',['class' => 'btn btn-success'])}}
        </div>
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