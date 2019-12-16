@extends('css.layouts.master')


<style type="text/css">
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

@section('content')


<!--<div class="main" style="margin-left:120px">-->
<div class="container">
            
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">

            @role('admin')
                <div class="card-header">Admin Dashboard</div>
            @endrole
            

            @role('staff')
                <div class="card-header">Staff Dashboard</div>
            @endrole

            @role('agent')
                <div class="card-header">AgentDashboard</div>
            @endrole

            @role('user')
                <div class="card-header">User Dashboard</div>
            @endrole

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        
                    @endif
            @role('admin')        
                Welcome Admin
            @endrole


            @role('staff')        
                Welcome Staff
            @endrole
        

            @role('agent')        
                Welcome Agent
                <a href="{{ url('registeruser') }}" >{{ __('Register User') }}</a>
            @endrole
            

            @role('user')        
                Welcome User
            @endrole

            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection