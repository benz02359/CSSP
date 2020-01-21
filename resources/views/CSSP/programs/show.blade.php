@extends('cssp.layouts.master')

@section('content')
<button class="btn btn-outline-warning" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<hr>
    <h1>ชื่อ: {{$program->name}}</h1>
    <p>รายละเอียด: {{$program->detail}}</p>
    <p>ราคา: {{$program->price}} บาท</p>
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
    <div class="row">   
        <a href="/programs/{{$program->id}}/edit" class="btn btn-outline-info">แก้ไข</a>

        {!!Form::open(['action' => ['ProgramController@destroy', $program->id], 'method' => 'POST', 'class' => 'float-right', 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
        {!!Form::close()!!}
    </div> 
@endsection