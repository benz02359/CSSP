@extends('layouts.app')

@section('content')
<style>
.items{ 
    padding: 8px 30px 5px 20px;
    margin: 3px 0px 6px 15px;
    background-color: #f7f7f7;
}
.items,a:link{
    color: #000;
}
.items,a:visited{
    color: #000;
}
</style>

    <h1>ผลการค้นหาคำว่า "{{$search}}"</h1>
    @if (count($posts) > 0 or isset($cate) )
       @foreach($posts as $post)
        @if(Auth::user()->role_id == '1' or Auth::user()->role_id == '2')
        <div class="card items">
                <blockquote class="blockquote mb-0">                
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <div class="row">  
                        <div class="col-9"><footer class="blockquote-footer">{!!substr(strip_tags($post->text), 0, 50) !!} <a href="/posts/{{$post->id}}">...อ่านเพิ่มเติม</a></footer></div>
                        <div class="col-3" style="text-align:right;color:dimgray"><small> วันที่โพสต์ {{date('j/n/Y   H:i', strtotime($post->created_at))}}</small></div>
                        </div>    
                </blockquote>
        </div>
        @elseif (Auth::user()->company_id === $post->user->company_id)
        <div class="card items ">
                <blockquote class="blockquote mb-0">                
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <div class="row">  
                        <div class="col-9"><footer class="blockquote-footer">{!!substr(strip_tags($post->text), 0, 50) !!} <a href="/posts/{{$post->id}}">...อ่านเพิ่มเติม</a></footer></div>
                        <div class="col-3" style="text-align:right;color:dimgray"><small> วันที่โพสต์ {{date('j/n/Y   H:i', strtotime($post->created_at))}}</small></div>
                        </div>    
                </blockquote>
        </div>
        <!-- <div class="card padding p-3">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>{!!substr(strip_tags($post->text), 0, 50) !!}{!! strlen(strip_tags($post->text)) > 50 ? "..." : ""!!}</small>
            <small>{{date('j M Y', strtotime($post->created_at))}}</small>
        </div> -->
        @endif           
        @endforeach

        @foreach($cate as $cat)
        <div class="card items">
                <blockquote class="blockquote mb-0">                
                        <h3>{{$cat->name}}</h3>
                </blockquote>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>รายการปัญหาในหมวดหมู่{{ $cat->name }} </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cate as $pc)
                @php
                $p = $pc->post;
                $u = $p[0]->user;
                $com = $u->company_id;
                @endphp
                @if (Auth::user()->company_id == $com)
                <tr>
                    @foreach($pc->post as $post)
                    <td><a href="/posts/{{$post->id}}">{{ $post->title}}</a></td>
                    @endforeach
                    <!--<td><a href="" class="btn btn-default btn-xs">View</a></td>-->
                </tr>
                @endif     
                @endforeach
                
                <tr>
            </tbody>
        </table>
              
        @endforeach
       
    @else
    <p>ไม่มีกระทู้</p>
        
    @endif
    
    
@endsection