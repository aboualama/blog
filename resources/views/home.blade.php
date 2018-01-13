@extends('layouts.app')

@section('pageTitle')
   Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard: {{ $user->name }} 
                    <span style="margin-left: 10px;"> 
                      @if($user->facebook)
                       <a href="{{ $user->facebook }}" target="_blank"><span class="fa fa-facebook" style="width: 20px"></span></a>
                      @endif
                      @if($user->twitter == Null)
                        <span >   </span>  
                      @else 
                        <a href="{{ $user->twitter }}" target="_blank"><span class="fa fa-twitter" style="width: 20px"> </span></a> 
                      @endif   
                    </span> 
                   <i class="fa fa-plus  pull-right" aria-hidden="true"><a href="{{ url('/post/create') }}">  Add New Post</a> </i>
                </div> 
  
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>The Post</h1>

                    <table class="table table-bordered" > 
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>The Title</th>
                          <th>The Content</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $post) 
                        <tr>
                          <th scope="row"> {{ $num++ }} </th>
                          <td> <a href="/post/{{ $post->slug }}">{{ $post->title }}</a> </td>
                          <td> {!! str_limit( strip_tags($post->content)   , 100 , $end = '  ..... ') !!} </td> 
                          <td> <a href="/post/{{ $post->id }}/edit" class="btn btn-primary">Edit</a> </td> 
                          <td> 
                              {{ Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                              {{ Form::close() }}
                          </td>  
                        </tr>
                        @endforeach
                      </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('sidebar') 
@endsection