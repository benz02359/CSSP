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
                <div class="card-header">บริษัท    <span><a href="{{ url('/companies/create')}}" class="btn btn-primary">Add New</a></span></div>
                </div>
                <div class="container">
                <h2 class="text-center"></h2>
                <table class="table table-bordered" width="auto">
                
                @foreach($companies as $company) 
                <tr><td>
                <a href="{{ url('/companies',$company->id)}}">{{$company->name}}</a>
                </td></tr>
                @endforeach
                
                </table>
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