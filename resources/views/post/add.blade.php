@extends('layouts.app')

@section('pageTitle')
   Add New Post
@endsection

@section('content')




<h1>Add New Post</h1>


<form class="form-group" method="post" enctype="multipart/form-data" action="/post"> 
  {{ csrf_field() }}

<div class="form-group">
  <label>Title Post</label>
  <input class="form-control" type="text" name="title" >
</div>

<div class="form-group">
  <label>Content Post</label>
  <textarea class="form-control ckeditor" type="text" name="content"></textarea>
</div>

<div class="form-group">
  <label>Add File</label>
  <input type="file" name="img" value="Add" class="btn btn-primary" > 
</div>


<div class="form-group">
  <label>Category Name</label> 
  <select  class="form-control" name="cat" value="Add"> 
        @foreach(\App\Category::get() as $category) 
                  @foreach($category->Subcategories as $subcategory) 
                        <option>{{ $subcategory->name }}</option> 
                  @endforeach  
          @endforeach 
  </select>
</div> 

<div class="form-group">
  <input type="submit" name="add" value="Add" class="btn btn-lg btn-success" >
</div> 
</form> 
 
  
	 
@endsection


@section('sidebar')
	@include('layouts.sidebar');
@endsection