@extends('cssp.layouts.master')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    
                    
                    <div class="panel-body">
                        <a href="/posts/create" class="btn btn-primary">Create Post</a>
                        <h3>All Posts</h3>
                        @if(count($posts) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th width="40%">พนักงาน</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><a href="/posts/{{$post->id}}" target="_blank">{{$post->title}}</a></td>
                                        <td><small>{{$post->created_at}}</small></td>
                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                        <td>
                                            {{$post->staff['name']}}
                                        </td>
                                        <td>                                                                                           
                                            {!!Form::open(['action' => ['AppointmentController@update', $post->id], 'method' => 'PUT', 'class' => 'pull-right'])!!}
                                            
                                                
                                                {!! Form::select('staff',$staff, ['class' => 'form-control'],['placeholder' => 'เลือกพนักงาน']) !!} 
                                                
                                            </td>
                                            <td>
                                            {{Form::hidden('_method','PUT')}}
                                            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                                            {!!Form::close()!!}  
                                        </td>                                      
                                        </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no posts</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection