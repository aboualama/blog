@extends('layouts.app')


@section('pageTitle')
   Category: {{ $name }}
@endsection


@section('content')


@if($posts->count() > 0)



   @foreach ($posts as $post)
        <!-- Blog Post -->
        <div class="card mb-4 post">
          <h2 class="card-title">{{ $post->title }}</h2>
          <div >
            <span> Posted on {{ $post->created_at }} </span>               
 
            <span style="margin-left: 50px;" > Category: {{ $name }} </span>
          </div>

          <img class="card-img-top img-thumbnail img-responsive" src="../upload/{{ $post->img }}"  alt="{{ $post->title }}" style="width: 750px; height: 300px">
          <div class="card-body">
            
            <p class="card-text">{!! str_limit( strip_tags($post->content)   , 200 , $end = '  ..... ') !!}</p> 
            <a href="../post/{{ $post->slug }}" class="btn btn-primary">Read More &rarr;</a>
          </div>

        </div>
        <hr>
  @endforeach
   
@else
  
  <div class="alert alert-danger"> <strong>Sorry</strong> There is No Post In This Category</div>

@endif

@endsection

@section('sidebar')
	@include('layouts.sidebar');
@endsection