@extends('css.layouts.master')



@section('content')

<style>
.wrapper {
  margin: 150px 0px 0px 150px;
  position: relative;
  perspective: 80em;
  width: 700px;
  display: grid;
  transform-style: preserve-3d;
}

.card {
  grid-area: 1 / 1;
  height: 200px;
  width: 700px;
  transform: translateX(10px) rotateY(25deg) rotateX(10deg);
  background: #EDB74Cef;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding: 30px;
  color: #000;
  text-transform: uppercase;
  font-size: 40px;
  font-weight: 900;
  backface-visibility: hidden;
  box-shadow: 0 10px 30px -3px rgba(0,0,0,.1);
}

h1 {
  font-size: 40px;
  font-weight: 900;
}

.card .enclosed {
  background: #000;
  line-height: 1;
  font-size: 65px;
  color: #EDB74C;
  padding: 2 5px;
  display: inline-block;
  transform: translate(-1px, 1px) scale(0.75);
  transform-origin: right center;
}

.wrapper:before {
  --bw: 9px;
  grid-area: 1 / 1;
  content: '';
  backface-visibility: hidden;
  height: 100%;
  width: 100%;
  margin-top: calc(-1 * var(--bw));
  margin-left: calc(-1 * var(--bw));
  background: transparent;
  transform: translateX(-60px) rotateY(-30deg) rotateX(15deg) scale(1.03);
  pointer-events: none;
  border: var(--bw) solid #000;
  box-sizing: content-box;
}


.wrapper:hover > div,
.wrapper:hover:before {
  transform: none;
}


.wrapper > div,
.wrapper:before {
  will-change: transform;
  transition: .3s transform cubic-bezier(.25,.46,.45,1);
}

</style>

<!--<div class="main" style="margin-left:120px">-->
           
            @role('admin')
            @endrole
            

            @role('staff')
            
            @endrole

            @role('agent')
         
            @endrole

            @role('user')
            
            @endrole

                    @if (session('status'))
                            {{ session('status') }}
                        
                    @endif

            @role('admin')        
            <div class="wrapper" >
            <div class="card" >
            <h1><span class="enclosed">UNIXDEV</span>x customer service</h1>
            <h4>Dashboard of Admin</h4> 
            </div>
            </div>
            @endrole


            @role('staff')        
            <div class="wrapper" >
            <div class="card" >
            <h1><span class="enclosed">UNIXDEV</span>x customer service</h1>
            <h4>Dashboard of Admin</h4> 
            </div>
            </div>
            @endrole
        

            @role('agent')        
            <div class="wrapper" >
            <div class="card" >
            <h1><span class="enclosed">UNIXDEV</span>x customer service</h1>
            <a href="{{ url('registeruser') }}" >{{ __('สมัครสมาชิกพนักงาน') }}</a> 
            </div>
            </div>
      
            @endrole
            

            @role('user')        
                Welcome User
            @endrole

            
@endsection