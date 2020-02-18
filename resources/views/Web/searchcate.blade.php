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
        @foreach($cate as $cat)
        <div class="card items">
                <blockquote class="blockquote mb-0">                
                        <h3>{{$cat['name']}}</h3>
                </blockquote>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>รายการปัญหาในหมวดหมู่{{ $cat['name'] }} </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cate as $pc)
                @php
                $p = $pc['post'];
                $u = $p['user'];
                $com = $u['company_id'];
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
    
    
@endsection