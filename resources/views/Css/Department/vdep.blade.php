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
                <div class="card-header">Department</div>
                <div class="card-body">
                    <vdep></vdep>
                </div>                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
@endsection