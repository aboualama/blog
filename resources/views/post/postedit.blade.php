@extends('layouts.app')

@section('pageTitle')
   Edit Post
@endsection


@section('content')


<form class="form-group" style="width:80%; margin:10px auto;" method="POST" enctype="multipart/form-data" action="{{route('post.update', $post->id)}}"> 
  {{ method_field('PUT') }}{{csrf_field()}}


<div class="form-group">
  <label>Title Post</label>
  <input class="form-control" type="text" name="title" value="{{ $post->title }}" >
</div>


<div class="form-group">
  <label>Post Content</label>
    <textarea class="form-control ckeditor" name="content" value=" "> {!! $post->content !!} </textarea>
</div>
 
  <input type="file" name="img" class="btn btn-lg btn-primary" style="margin-top:10px">
  <input type="submit" name="add" value="update" class="btn btn-lg btn-success" style="margin-top:10px">
  <button class="btn btn-lg btn-danger" style="margin-top:10px"><a href="../../post" style="color:#fff; float: right; ">Back</a></button>
</form> 

@endsection


@section('sidebar')
	@include('layouts.sidebar');
@endsection