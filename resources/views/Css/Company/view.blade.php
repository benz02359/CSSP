@extends('css.layouts.master')

@section('style')
<style type="text/css">
.card{
    width: 100%;
}
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">บริษัท    <span><a href="companies/create" class="btn btn-primary">ลงทะเบียน</a></span></div>
                </div>
                <div class="card-body">

              
                <h3>ข้อมูลบริษัท    
                @foreach($companies as $company)<span><a href="{{ url('companies/edit',$company->id)}}" class="btn btn-primary">แก้ไขข้อมูล</a></span></h3>
                ชื่อบริษัท: {{$company->name}}
                <br>E-mail: {{$company->email}}
                <br>หมายเลขโทรศัพท์: {{$company->tel}}
                <br>ที่อยู่: {{$company->address}}
                <br><br>
                @endforeach


                <h3>โปรแกรมที่ใช้   <span><a href="{{ url('programs/create')}}" class="btn btn-primary">ลงทะเบียน</a></span></h3>
                @foreach($programs as $p)
                ชื่อโปรแกรม: <a href="{{ url('/programs',$p->id)}}">{{$p->name}}</a>
                <br><br>
                @endforeach


                <h3>ตัวแทนบริษัท    <span><a href="{{ route('registeragent') }}" class="btn btn-primary">ลงทะเบียน</a></span></h3>
                @foreach($agents as $a)
                ชื่อตัวแทน: <a href="{{ url('/agents',$a->id)}}">{{$a->name}} </a>
                <br>E-mail: {{$a->email}}
                <br>หมายเลขโทรศัพท์: {{$a->tel}}                
                <br><br>
                @endforeach


                <h3>ผู้ใช้งานในบริษัท</h3>
                @foreach($users as $u)
                ชื่อผู้ใช้: {{$u->name}}
                <br>E-mail: {{$u->email}}
                <br>หมายเลขโทรศัพท์: {{$u->tel}}                
                <br><br>
                @endforeach


                </div>
            


                <!--<div class="card-body">
                    <vcompany></vcompany>
                </div>-->                        
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
@endsection