@extends('cssp.layouts.master')

@section('content')
<button class="btn btn-primary" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<hr>
    <p>ชื่อ: {{$staff->name}}</p>
    <p>E-mail: {{$staff->email}}</p>
    <p>เบอร์โทรศัพท์: {{$staff->tel}}</p>
    <p>ภาษาที่ใช้: {{$staff->language}}</p>
    <p>ตำแหน่ง: {{$staff->position}}</p>
    @foreach ($deps as $dep)
    <p>แผนก: {{$dep->name}}</p>
    @endforeach
   
    <hr>
    <hr>
        <a href="/staffs/{{$staff->id}}/edit" class="btn btn-primary">Edit</a>
        {!!Form::open(['action' => ['StaffController@destroy', $staff->id], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
@endsection