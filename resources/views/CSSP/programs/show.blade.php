@extends('cssp.layouts.master')

@section('content')
<button class="btn btn-primary" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<hr>
<a href="/programs/{{$program->id}}/edit" class="btn btn-primary">แก้ไข</a>
<hr>
    <h1>ชื่อ: {{$program->name}}</h1>
    <p>รายละเอียด: {{$program->detail}}</p>
    <p>ซื้อเมื่อ: {{$program->solddate}}</p>
    <p>วันที่เริ่ม: {{$program->startdate}}</p>
    <p>วันที่สิ้นสุด: {{$program->enddate}}</p>
<hr>

<h1>บริษัทที่เป็นเจ้าของ</h1>
@foreach ($company as $com)
    <p style="font-size:25px">ชื่อ: <a href="{{ route('companies.show', $com->id ) }}">{{$com->name}}</a></p>
@endforeach
<hr>

   
    <hr>
    <hr>
        
        {!!Form::open(['action' => ['ProgramController@destroy', $program->id], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
@endsection