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
                <div class="card-header">Company</div>
                <h1>Edit com</h1>
                {!! Form::open(['action' => ['CompanyController@update', $company->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('name', 'ชื่อ')}}
                        {{Form::text('name', $company->name, ['class' => 'form-control', 'placeholder' => 'ชื่อ'])}}
                    </div>
                    <!--<div class="form-group">
                        {{Form::label('body', 'Body')}}
                        {{Form::textarea('body', $company->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                    </div>
                    <div class="form-group">
                        {{Form::file('cover_image')}}
                    </div>-->
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}

                    
                                      
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
@endsection