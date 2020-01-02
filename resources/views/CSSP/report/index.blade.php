@extends('cssp.layouts.master')

@section('content')
<div class="row">
    <div class="container">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">กระทู้</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">{{count($posts)}} <small class="text-muted">กระทู้</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>จำนวนกระทู้คำถาม :{{$post1}}</li>
                    <li>จำนวนกระทู้ข่าว :{{$post2}}</li>
                    </ul>

                </div>
                </div> 
                <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                          <h4 class="my-0 font-weight-normal"> จำนวนรายการขาย </h4>
                        </div>
                        <div class="card-body">
                          <h1 class="card-title pricing-card-title">{{count($sales)}} <small class="text-muted">รายการ</small></h1>
                          <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                          </ul>
                        
                        </div>
                      </div>
                      <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                          <h4 class="my-0 font-weight-normal">ยอดรวมจากการขายโปรแกรม</h4>
                        </div>
                        <div class="card-body">
                          <h1 class="card-title pricing-card-title">{{$price}} บาท<small class="text-muted"></small></h1>
                          <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                          </ul>
                        </div>
                      </div>
                    </div>
</div>
@endsection