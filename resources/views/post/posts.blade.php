@extends('layouts.app')

@section('pageTitle')
   The Post
@endsection


@section('content')
 

  @if (Auth::user())
    <a class="btn btn-lg btn-success add_post" href="{{ url('/post/create') }}">Add New Post</a> 
  @endif

  @foreach ($posts as $post)
        <!-- Blog Post -->
        <div class="card mb-4 post">
          <h2 class="card-title">{{ $post->title }}</h2>
          <div class="card-footer text-muted">
 
          <div >
            <span> <strong> Posted on: </strong> {{ $post->created_at->format('Y-m-d') }} </span>  
            <span style="margin-left: 50px;" ><strong> Author: </strong> {{ $post->user['name'] }}   </span>   
          </div>
          </div>

          <img class="card-img-top img-thumbnail img-responsive" src="upload/{!! $post->img !!}"  alt="{!! $post->title !!}" style="width: 750px; height: 300px">
          <div class="card-body">
          <p class="card-text">{!! str_limit( strip_tags($post->content)   , 200 , $end = '  ..... ') !!}</p> 
             </div>
            <div class="row">
              <div class="col-xs-9">
               <a href="post/{{ $post->slug }}" class="btn btn-success">Read More &rarr;</a> 
              </div>


              @if( Auth::id() == $post->user_id)  
              <div class="col-xs-1">
                <a href="/post/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>    
              </div>
              <div class="col-xs-1">
                 {{ Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->slug] , 'class' => 'form-inline']) }}
                      {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
              </div>  
              @endif 
          </div>

        </div>
        <hr>
  @endforeach 

       {!! $posts->render() !!}  <!--  {!! $posts->links() !!} -->


 

@endsection

@section('sidebar')
	@include('layouts.sidebar');
@endsection