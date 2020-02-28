<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Sale;
use App\posttype;
use App\program;
use Carbon\Carbon;
use PDF;

class PDFController extends Controller
{
    function report1()
    {
        $pro = Program::all();
        $post = Post::all();
        $programUnique = $post->unique('pro_id');

        //$programUnique = max($program);
        $mostp = $post->diff($programUnique);
        //$test = DB::table('posts')->where('pro_id', '=', '$pro->id')->count();
        $report1 = $mostp; 
        
        return view('cssp.report.pdf1',compact('programUnique',$programUnique/*,'test',$test*/))
    ->with('report1',$report1,'programUnique',$programUnique/*,'test',$test*/);
    }
    function pdf1()
    {
     $pdf = \App::make('dompdf.wrapper');
     //$pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'TH-Sarabun']);
     $pdf->loadHTML($this->convert_report1_to_html());
     return $pdf->stream();
    }
    function convert_report1_to_html()
    {
        $count = 0;   
        $pro = Program::all();
        $post = Post::all();
        $programUnique = $post->unique('pro_id');
        $mostp = $post->diff($programUnique);
        $report1 = $mostp; 
     //$report1 = $this->get_customer_data();
     $output = '
     <style>
     
     </style>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <h3 align="center">รายงานข้อมูลของ Customer Service</h3>
     <h4>โปรแกรมที่มีคำถามมากที่สุด</h4>
     <b>โปรแกรม</b> '.$programUnique[0]->program->name.' <b>บริษัท</b> '.$programUnique[0]->program->company->name.'
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="10%">ลำดับ</th>
    <th style="border: 1px solid; padding:12px;" width="30%">หัวข้อ</th>
    <th style="border: 1px solid; padding:12px;" width="30%">รายละเอียด</th>
    <th style="border: 1px solid; padding:12px;" width="30%">วันที่/เวลา</th>
   </tr>
     ';  
     foreach($report1 as $r1)
     {
        $count ++;
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$count.'</td>
       <td style="border: 1px solid; padding:12px;">'.$r1->title.'</td>
       <td style="border: 1px solid; padding:12px;">'.$r1->text.'</td>
       <td style="border: 1px solid; padding:12px;">'.$r1->created_at.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
    /*function get_report1_data()
    {
        $post = Post::all();
        $programUnique = $post->unique('pro_id');
        $mostp = $post->diff($programUnique);
        $report1_data = $mostp;

        return $report1_data;
    }*/
    function report2()
    {
        $pro = Program::all();
        $post = Post::all();
        $postthisyear = post::whereYear('created_at',Carbon::now()->year)->where('posttype_id','=','1')->count();
        $postinyear = post::whereYear('created_at',Carbon::now()->year)->where('posttype_id','=','1')->get();
        $report2 = $postthisyear; 
        
        return view('cssp.report.pdf2',compact('postinyear',$postinyear))
        ->with('report2',$report2,'postinyear',$postinyear);
    }
    function report11()
    {
        $pro = Program::all();
        $post = Post::all();
        $programUnique = $post->unique('pro_id');

        //$programUnique = max($program);
        $mostp = $post->diff($programUnique);
        //$test = DB::table('posts')->where('pro_id', '=', '$pro->id')->count();
        $report1 = $mostp; 
        
        return view('cssp.report.pdf11',compact('programUnique',$programUnique/*,'test',$test*/))
    ->with('report1',$report1,'programUnique',$programUnique/*,'test',$test*/);
    }
    function report22()
    {
        $pro = Program::all();
        $post = Post::all();
        $postthisyear = post::whereYear('created_at',Carbon::now()->year)->where('posttype_id','=','1')->count();
        $postinyear = post::whereYear('created_at',Carbon::now()->year)->where('posttype_id','=','1')->get();
        $report2 = $postthisyear; 
        
        return view('cssp.report.pdf22',compact('postinyear',$postinyear))
        ->with('report2',$report2,'postinyear',$postinyear);
    }
}
