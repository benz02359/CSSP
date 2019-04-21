@extends('css.layouts.master')

@section('style')
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
@endsection

@section('content')
<div class="sidenav">
           <!-- <a href="{{url('/')}}" class="fa fa-home"> Home</a>
            <a href="{{url('/help')}}" class="fa fa-search"> Helper</a>
            <a href="{{url('/contact')}}" class="fa fa-id-card-o"> Contact</a>
            <a href="{{url('/solution')}}" class="fa fa-question-circle-o"> Solution</a>
            <a href="{{url('/forum')}}" class="fa fa-comments-o"> Forums</a>
            <a href="{{url('/report')}}" class="fa fa-bar-chart-o"> Reports</a> -->
            
            <a href="{{url('/')}}" class="fa"> Home</a>
            
            @role('admin')
            @endrole

            @role('staff')
            @endrole

            @role('agent')
            @endrole


            <!-- permission -->
            @can('managestaff')
            <a href="#" > Staff</a>
            @endcan

            @can('managecompany')
            <a href="#" > Company</a>
            @endcan

            @can('managecustomer')
            <a href="#" > Customer</a>
            @endcan
    
            <!--@can('managedepartment')
            <a href="#" > Department</a>
            @endcan -->

            @can('appointment')
            <a href="#" > Appointment</a>
            @endcan
        
            @can('selling')
            <a href="#" > Sale History</a>
            @endcan

            @can('program')
            <a href="#" > Program</a>
            @endcan
            
            @can('regisuser')
            <a href="#" > Register User</a>
            @endcan

            @can('regisstaff')
            <a href="#" > Register Staff</a>
            @endcan

            @can('regisagent')
            <a href="#" > Register Agent</a>
            @endcan

            @can('post')
            <a href="#" > Post</a>
            @endcan

            @can('forum')
            <a href="#" > Forum</a>
            @endcan

            @can('category')
            <a href="#" > Category</a>
            @endcan

            @can('result')
            @endcan

            
            <!--
            <a href="#" > Helper</a>
            <a href="{{url('/help')}}" > Helper</a>
            <a href="{{url('/contact')}}" > Contact</a>
            <a href="{{url('/solution')}}" > Solution</a>
            <a href="{{url('/forum')}}" > Forums</a>
            <a href="{{url('/report')}}" > Reports</a>
            -->
            

            
            
            

        </div>

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
            @endrole
            

            @role('user')        
                Welcome User
            @endrole

            
                </div>
            </div>
        </div>
    </div>
</div>
<!--               <div class="container">
    <div class="card card-default col-sm-2">
    <div class="card-header">
                        <strong>Solutions</strong>
</div>
                <div class="card-body">
                    <h1></h1>
                </div>
            </div>
        
        <div class="card card-default col-sm-2">
        <div class="card-header">
                        <strong>solve</strong>
</div>
            <div class="card-body">
                <h1>1</h1>
            </div>
        </div>

        <div class="card card-default col-sm-2">
        <div class="card-header">
                        <strong>unsolve</strong>
</div>
            <div class="card-body">
                <h1>2</h1>
            </div>
        </div>
        
    </div>
    
<br><br><br><br><br><br><br><br>
<div class="container satis">
    <div class="card card-large col-sm-4">
    <div class="card-header">
                        <h1>Customer satisfaction</h1>
    </div>
                        <strong>received 2</h1>
                <div class="card-body">
                    <li class="fa fa-smile-o">Happy 2</li>
                    <li class="fa fa-frown-o">Sad 0</li>
                </div>
            </div>
    </div>
</div>
            </div>
        </div>
    </div>

    

-->
@endsection