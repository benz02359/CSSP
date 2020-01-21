@extends('cssp.layouts.master')

@section('content')
<button class="btn btn-primary" onclick="goBack()" >Go Back</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<!--<button class="btn btn-primary" onclick="goBack()" {{ url()->previous() }}>Go Back</button>-->

<hr>

    <h2>ชื่อ: {{$company->name}}</h2>
    <h2>ที่อยู่: {{$company->address}}</h2>
    <h2>เบอร์โทรศัพท์: {{$company->tel}}</h2>
    <h2>E-mail: {{$company->email}}</h2>
    
<a href="/companies/{{$company->id}}/edit" class="btn btn-primary">แก้ไข</a> <a href="/companies/{{$company->id}}/editp" class="btn btn-primary">เพิ่มรายการโปรแกรมที่ขาย</a>   
<hr>

        
{!!Form::open(['action' => ['CompanyController@destroy', $company->id], 'method' => 'POST', 'class' => 'float-right', 'onsubmit' => 'return confirm("ต้องการที่จะลบใช่ไหม?")'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endsection