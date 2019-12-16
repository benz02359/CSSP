@extends('cssp.layouts.master')

@section('content')
<button class="btn btn-primary" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<hr>
    <h1>แก้ไขข้อมูล</h1>
    {!! Form::open(['action' => ['HQController@update', $hq->id], 'method' => 'PUT']) !!}
    <div class="form-group">
            {{Form::label('name', 'ชื่อ')}}
            {{Form::text('name',$hq->name,['class' => 'form-control','placeholder' => 'ชื่อ'])}}
        </div>
        <div class="form-group">
            {{Form::label('address', 'ที่อยู่')}}
            {{Form::textarea('address',$hq->address,['class' => 'form-control','placeholder' => 'ที่อยู่'])}}
        </div>
        <div class="form-group">
            {{Form::label('tel', 'เบอร์โทรศัพท์')}}
            {{Form::text('tel',$hq->tel,['class' => 'form-control','placeholder' => 'เบอร์โทรศัพท์'])}}
        </div> 
        <div class="form-group">
                {{Form::label('email', 'E-mail')}}
                {{Form::text('email',$hq->email,['class' => 'form-control','placeholder' => 'E-mail'])}}
            </div>
        
               
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}    
@endsection