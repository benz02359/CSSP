<?php
// Require composer autoload

require_once __DIR__ . '/../../../vendor/autoload.php';



// Create an instance of the class:

$mpdf = new \Mpdf\Mpdf([ 	
    'default_font' => 'Garuda'
]);

// Write some HTML code:
ob_start();
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Laravel - How to Generate Dynamic PDF from HTML using DomPDF</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  body{
    font-family: "Garuda";
    font-size: 12pt;
}
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
<?php
ob_start();
?>
  <div class="container">
   <h3 align="center">รายงานข้อมูลของ Customer Service</h3><br />
   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4>โปรแกรมที่มีคำถามมากที่สุด</h4>
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
       <td><a href="/posts/{{$r1->id}}">{{$r1->title}}</a></td>
       <td>{!! $r1->text !!}</td>
       <td>{{$r1->created_at}}</td>  
         
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
  </div>
<?php
$html = ob_get_contents();
$mpdf->WriteHTML($html);
$mpdf->Output("Report1.pdf");
ob_end_flush();

?>
  <div class="col-md-3" align="right">
    <a href="report1.pdf" class="btn btn-danger">Convert into PDF</a>
   </div>
 </body>
</html>
