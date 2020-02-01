@extends('cssp.layouts.master')

@section('content')
<style>

.card {
  background: white;
  margin: 100px auto;
  border-radius: 12px;
  box-sizing: border-box;
  text-align: center;
  max-width: 400px;
  max-height: null;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.products {
  position: relative;
  overflow: hidden;
  transition: duration ease;
}
.product {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  visibility: hidden;
  transition: duration ease;
}

.thumbnail {
  margin: 0 0;
}

.title {
  margin: 0 0 ;
  color: #D18B49;
  font-size: 24px;
  transition: duration ease;
}
.description {
  margin: 0 0 (gutters * 2);
}

</style>
<br><br>
    <div class="card">
    <div class="products">
    <div class='thumbnail'>
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/Stag.svg">
        <h1 class='title'> กระทู้ </h1>
        <h1 class="card-title pricing-card-title">{{count($posts)}} <small class="text-muted">กระทู้</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>จำนวนกระทู้คำถาม :{{$post1}}</li>
                    <li>จำนวนกระทู้ข่าว :{{$post2}}</li>
                    </ul>
</div>
</div>
</div>

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