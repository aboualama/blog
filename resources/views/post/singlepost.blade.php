@extends('layouts.app')

@section('pageTitle')
   {{ $post->title }}
@endsection
 
@section('content')
 
        <!-- Blog Post -->        

    <div class="card mb-4 post">
        <h2 class="card-title">{{ $post->title }}</h2>
        <div class="card-footer text-muted"> 
        <div class="row">
          <div class="col-xs-4"> 
                <span> <strong> Posted on: </strong> {{ $post->created_at->format('Y-m-d') }}</span> 
          </div>
          <div class="col-xs-5"> 
                <span><strong> Author: </strong>  {{ $user->name }} 

                    <span style="margin-left: 10px;"> 
                      @if($user->facebook)
                        <a href="{{ $user->facebook }}" target="_blank"><span class="fa fa-facebook" style="width: 20px"></span></a>
                      @endif
                      @if($user->twitter == Null)
                        <span >   </span>  
                      @else 
                        <a href="{{ $user->twitter }}"><span class="fa fa-twitter" target="_blank" style="width: 20px"></span></a> 
                      @endif   
                    </span> 
                </span>  
              </div>


            <div class="col-xs-3"> 

            @if( Auth::id() == $post->user_id) 
                <div class="col-xs-6">
                  <a href="/post/{{ $post->id }}/edit" class="btn  btn-sm btn-primary">Edit</a>    
                </div>
                <div class="col-xs-6">
                   {{ Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->slug] , 'class' => 'form-inline']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
                </div>  
            @endif 
            </div>           
          </div> 
      </div>            

  <img class="card-img-top img-thumbnail img-responsive" src="../upload/{{ $post->img }}"  alt="{{ $post->title }}" style="width: 750px; height: 300px">
  <div class="card-body">
    
    <p class="card-text">{!!  $post->content  !!}</p> 
  </div>


    </div>
<hr>
 
	 
@endsection


@section('sidebar')
	@include('layouts.sidebar');
@endsection