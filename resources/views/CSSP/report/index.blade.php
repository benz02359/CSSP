@extends('cssp.layouts.master')

@section('content')
<style>

.card {
  background: white;
  margin: 30px auto;
  border-radius: 12px;
  box-sizing: border-box;
  text-align: center;
  max-width: 550px;
  max-height: null;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.thumbnail {
  background-color: #F8B33C;
  padding: 1px;
  margin: 0 0  10px 0;
  border-radius: 12px 12px 0px 0px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.title {
  margin-top: -150px;
  padding: 5px;
  color: #FFF;
  font-size: 28px;
  margin-top: 20px;
  

}
.description {
  margin: 0 0 (gutters * 2);
}

</style>
<br><br>
 <div class="row">
    <div class="card" style="width: 230px">
      <div class="products">
        <div class="thumbnail">
          <h1 class="title"> กระทู้ </h1></div>
          <h1 class="card-title pricing-card-title">{{count($posts)}} <small class="text-muted">กระทู้</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>จำนวนกระทู้คำถาม :{{$post1}}</li>
                    <li>จำนวนกระทู้ข่าว :{{$post2}}</li>
                    </ul>
        
      </div>
    </div>
<!-- -----------------end------------------------ -->
    <div class="card" style="width: 240px">
      <div class="products">
          <div class="thumbnail">
              <h1 class='title'> จำนวนรายการขาย </h1> </div>
              <h1 class="card-title pricing-card-title">{{count($sales)}} <small class="text-muted"> รายการ</small></h1>
           
          </div>
        </div>
<!-- -----------------end------------------------ -->
      <div class="card" style="width: 400px">
        <div class="products">
          <div class="thumbnail">
              <h1 class='title'> รายได้รวมจากการขายโปรแกรม </h1>  </div>
              <h1 class="card-title pricing-card-title">{{($price)}} <small class="text-muted">บาท</small></h1>
          
          </div>
        </div>

    </div>
<!-- -----------------end------------------------ -->
  
<div class="card" style="width: 400px">
  
  <div class="products">
    <div class="thumbnail">
        <h1 class='title'> โปรแกรมที่มีคำถามมากที่สุด </h1>  </div>
        <h1 class="card-title pricing-card-title">{{$mostp[0]->program->name}} มีทั้งหมด {{count($mostp)}} คำถาม <a href=""> <small class="text-muted"></small></h1>
      <a href="/reportprogram" class="btn btn-outline-warning"> รายละเอียด </a>
    </div>
  </div>
  <input type="hidden" name="pro_data[]" value="{{$mostp}}">
  
</form>
</div>
<!-- -----------------end------------------------ -->






<!--
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

-->

@endsection