@extends('cssp.layouts.master')
   <!-- title unixdev -->
   <title> อนุมัติผู้ใช้งาน</title>
    <!-- add icon link -->
    <link rel = "icon" href ="<?php echo asset('assets/img/logo2.png'); ?>"  type = "image/x-icon">
@section('sidenav')
@endsection

@section('content')
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               <h3>ผู้ใช้งานที่รอการอนุมัติ</h3>
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark" style="text-align: center">
                            <tr>
                                <th>ชื่อผู้ใช้</th>
                                <th>Email</th>
                                <th>ลงทะเบียนเมื่อ</th>
                                <th colspan="2">อนุมติ</th>
                            </tr>    
                            </thead>                              
                                             
                            @forelse ($users as $user)
                            
                                @if ($user->company == $usercom->company)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td><a href="{{ route('admin.users.approve', $user->id) }}"
                                            class="btn btn-success btn-sm">อนุมัติ</a></td>
                                        <td><a href="{{ route('admin.users.dimiss', $user->id) }}"
                                            class="btn btn-danger btn-sm">ปฎิเสธ</a></td>
                                    </tr> 
                                 
                                @endif   
                                
                                
                            @empty
                                                    
                            
                            @endforelse
                                   
                        </table>
                
            </div>
        </div>
    </div>
@endsection