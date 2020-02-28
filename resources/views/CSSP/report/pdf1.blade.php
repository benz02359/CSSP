<!DOCTYPE html>
<html>
 <head>
  <title>Laravel - How to Generate Dynamic PDF from HTML using DomPDF</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  @font-face {
    font-family: 'THSarabunNew';
    src: url('thsarabunnew-webfont.eot');
    src: url('thsarabunnew-webfont.eot?#iefix') format('embedded-opentype'),
         url('thsarabunnew-webfont.woff') format('woff'),
         url('thsarabunnew-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'THSarabunNew';
    src: url('thsarabunnew_bolditalic-webfont.eot');
    src: url('thsarabunnew_bolditalic-webfont.eot?#iefix') format('embedded-opentype'),
         url('thsarabunnew_bolditalic-webfont.woff') format('woff'),
         url('thsarabunnew_bolditalic-webfont.ttf') format('truetype');
    font-weight: bold;
    font-style: italic;

}

@font-face {
    font-family: 'THSarabunNew';
    src: url('thsarabunnew_italic-webfont.eot');
    src: url('thsarabunnew_italic-webfont.eot?#iefix') format('embedded-opentype'),
         url('thsarabunnew_italic-webfont.woff') format('woff'),
         url('thsarabunnew_italic-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: italic;

}

@font-face {
    font-family: 'THSarabunNew';
    src: url('thsarabunnew_bold-webfont.eot');
    src: url('thsarabunnew_bold-webfont.eot?#iefix') format('embedded-opentype'),
         url('thsarabunnew_bold-webfont.woff') format('woff'),
         url('thsarabunnew_bold-webfont.ttf') format('truetype');
    font-weight: bold;
    font-style: normal;

}
body {
	font-family: 'THSarabunNew', sans-serif;
}
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
     <h4>โปรแกรมที่มีคำถามมากที่สุด</h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="{{ url('report1/pdf') }}" class="btn btn-danger">Convert into PDF</a>
    </div>
   </div>
   <br />
   <b>โปรแกรม</b> {{$programUnique[0]->program->name}} <b>บริษัท</b> {{$programUnique[0]->program->company->name}}
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
     @foreach($report1 as $r1)
     @php
         $count ++;
     @endphp
      <tr>
       <td style="width:5%">{{$count}}</td>
       <td>{{$r1->title}}</td>
       <td>{!! $r1->text !!}</td>
       <td>{{$r1->created_at}}</td>  
      <td><a href="/posts/{{$r1->id}}">ดูเพิ่มเติ่ม</a></td>    
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
  </div>
 </body>
</html>
