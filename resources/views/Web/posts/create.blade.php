@extends('layouts.app')
@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}
    
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">        
    <h1>สร้างกระทู้ใหม่</h1></div>  
    
<div class="container">
        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 shadow-sm"> 
            <a href="{{ route('createquestion') }}">           
            <div class="card-body">                            
              <h1 class="card-title pricing-card-title">ตั้งกระทู้คำถาม</h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>คำถามหรือปัญหาที่ต้องการคำตอบ</li>
                <li></li>
                <li></li>
                <li></li>
              </ul>  
            </div>
            </a> 
          </div>


          <!--<div class="card mb-4 shadow-sm">  
            <a href="{{ route('createtalk') }}">           
            <div class="card-body">            
              <h1 class="card-title pricing-card-title">ตั้งกระทู้สนทนา</h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>หัวข้อที่อยากพูดคุยแลกเปลี่ยนความรู้</li>
                <li></li>
                <li></li>
                <li></li>
              </ul>              
            </div>
        </a>   
          </div>-->


          <div class="card mb-4 shadow-sm">
            <a href="{{ route('createnews') }}">           
            <div class="card-body">
              <h1 class="card-title pricing-card-title">ตั้งกระทู้ข่าว</h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>หัวข้อเกี่ยวกับข่าวสารต่างๆ</li>
                <li></li>
                <li></li>
                <li></li>
              </ul>              
            </div>
            </a>
          </div>
        </div>

@endsection

@section('scripts')

{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
    $('.select2-multi').select2();
</script>
    
@endsection