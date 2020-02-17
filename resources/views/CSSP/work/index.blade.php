@extends('cssp.layouts.master')
 <!-- title unixdev -->
 <title> กระทู้ทั้งหมด </title>
<!-- add icon link -->
<link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                <br>
                        <h3>กระทู้ทั้งหมด</h3>
                        @if(count($posts) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($posts as $post)               
                                    <tr>
                                        <td><a href="/posts/{{$post->id}}" target="_blank">{{$post->title}}</a> ({{count($post->comments)}})</td>
                                        <td><small>{{$post->created_at}}</small></td>
                                                                                                                 
                                        </tr>
                                @endforeach
                            </table>
                        @else
                            <p>ไม่มีกระทู้</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection