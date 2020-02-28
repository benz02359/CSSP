<!DOCTYPE html>
<html>
 <head>
  <title>Laravel - How to Generate Dynamic PDF from HTML using DomPDF</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
  <br />
  <button class="btn btn-outline-warning" onclick="goBack()" >ย้อนกลับ</button>
<script>
    function goBack() {
        window.history.back();
    }
</script>
  <div class="container">
   <h3 align="center">รายงานข้อมูลของ Customer Service</h3><br />
   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4>คำถามทั้งหมดในปีนี้ ({{now()->format('Y')}}) มี {{$report2}} คำถาม</h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Convert into PDF</a>
    </div>
   </div>
   <br />
   
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th>ลำดับ</th>
       <th>หัวข้อ</th>
       <th>รายละเอียด</th>
       <th>วันที่/เวลา</th>
       <th></th>
      </tr>
     </thead>
     <tbody>
       
    @php
     $count = 0;    
     @endphp
     @foreach($postinyear as $r2)

     @php
         $count ++;
     @endphp
      <tr>
       <td style="width:5%">{{$count}}</td>
       <td>{{$r2->title}}</td>
       <td>{!! $r2->text !!}</td>
       <td>{{$r2->created_at}}</td>  
      <td><a href="/posts/{{$r2->id}}">ดูเพิ่มเติ่ม</a></td>    
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
  </div>
 </body>
</html>
