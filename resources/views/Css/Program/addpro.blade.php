@extends('css.layouts.master')

@section('style')
<style type="text/css">
.card.card-default{
    margin: 5px 5px;
    width: 15%;
    position:relative;
    display:block;
    padding-left: 0;
    padding-right: 6px;
    padding: 5px 5px;
}
</style>
@endsection

@section('content')

<!--<div class="main" style="margin-left:120px">-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Program    <span><a href="{{ url('programs/create')}}" class="btn btn-primary">ลงทะเบียน</a></span></div>
                <div class="card-body">
                
                {!! Form::open(['action' => 'ProgramController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('name', 'ชื่อโปรแกรม')}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'ชื่อโปรแกรม'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('detail', 'รายละเอียด')}}
                        {{Form::text('detail', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'รายละเอียด'])}}
                    </div>
                    <div class="form-group">
                        {{Form::select('companies',array_pluck($companies,'name'))}}
                    </div>
                    {{Form::hidden('_method','POST')}}
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}

                    <!--<addpro></addpro>-->
                </div>                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
@endsection