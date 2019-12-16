@extends('cssp.layouts.master')

@section('sidenav')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ผู้ใช้งานที่รอการอนุมัติ</div>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>ชื่อผู้ใช้</th>
                                <th>Email</th>
                                <th>ลงทะเบียนเมื่อ</th>
                                <th></th>
                            </tr>    
                                                          
                                             
                            @forelse ($users as $user)
                            
                                @if ($user->company === $usercom->company)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td><a href="{{ route('admin.users.approve', $user->id) }}"
                                            class="btn btn-primary btn-sm">อนุมัติ</a></td>
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
        </div>
    </div>
@endsection