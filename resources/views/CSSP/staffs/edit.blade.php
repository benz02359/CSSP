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
    {!! Form::open(['action' => ['StaffController@update', $staff->id], 'method' => 'PUT']) !!}
    <div class="form-group">
            {{Form::label('name', 'ชื่อ')}}
            {{Form::text('name',$staff->name,['class' => 'form-control','placeholder' => 'ชื่อ'])}}
        </div>
        <div class="form-group">
                {{Form::label('e-mail', 'E-mail')}}
                {{Form::text('e-mail',$staff->email,['class' => 'form-control','placeholder' => 'E-mail'])}}
            </div>
        <div class="form-group">    
            {{Form::label('tel', 'เบอร์โทรศัพท์')}}
            {{Form::text('tel',$staff->tel,['class' => 'form-control','placeholder' => 'เบอร์โทรศัพท์'])}}
        </div>
        <div class="form-group">
            {{Form::label('language', 'ภาษาที่ใช้')}}
            {{Form::text('language',$staff->language,['class' => 'form-control','placeholder' => 'ภาษาที่ใช้เขียนโปรแกรม'])}}
        </div>
        <div class="form-group">
            {{Form::label('position', 'ตำแหน่ง')}}
            {{Form::text('position',$staff->position,['class' => 'form-control','placeholder' => 'ตำแหน่ง'])}}
        </div>
        <div class="form-group">
            {{Form::label('dep', 'แผนก')}}            
            {!! Form::select('dep', $dep, null, ['class' => 'form-control']) !!} 
                     
        </div>
        
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}    
@endsection