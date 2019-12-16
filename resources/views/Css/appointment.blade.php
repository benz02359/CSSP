@extends('css.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Solution List to Approve</div>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Detail</th>
                                <th>User</th>
                                <th>Program</th>
                                <th></th>
                            </tr>
                            @forelse ($solutions as $solution)
                                <tr>
                                    <td>{{ $solution->title }}</td>
                                    <td>{{ $solution->text }}</td>
                                    <td>{{ $solution->user }}</td>
                                    <td>{{ $solution->pro_id }}</td>
                                    <td><a href="{{ route('admin.users.approve', $user->id) }}"
                                           class="btn btn-primary btn-sm">Approve</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No users found.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection