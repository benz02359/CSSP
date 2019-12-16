@extends('cssp.layouts.master')

@section('content')
<a href="/companies" class="btn btn-primary">Back</a>
<hr>
<a href="/companies/{{$company->id}}/edit" class="btn btn-primary">แก้ไข</a>
    <h2>ชื่อ: {{$company->name}}</h2>
    <h2>ที่อยู่: {{$company->address}}</h2>
    <h2>เบอร์โทรศัพท์: {{$company->tel}}</h2>
    <h2>E-mail: {{$company->email}}</h2>
    
    
<hr>

        
{!!Form::open(['action' => ['CompanyController@destroy', $company->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endsection