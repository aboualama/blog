          

<!-- Search About -->
<div class="sidebar0"> 

<div class="card my-4 sidebar">
  <h3 class="card-header text-center">About</h3>
  <div class="card-body">
    <div class="input-group text-justify">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer  containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
  </div>
</div>

<!-- Search Widget -->
<div class="card my-4 sidebar">
  <h5 class="card-header">Search</h5>
  <div class="card-body">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="button">Go!</button>
      </span>
    </div>
  </div>
</div>

<!-- Categories Widget -->
<div class="card my-4 sidebar">
  <h5 class="card-header">Categories</h5>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <ul class="list-unstyled mb-0">
                    @foreach(\App\Category::get() as $category) 
                                        {{ $category->name }}
                            @foreach($category->Subcategories as $subcategory)
                                <li >  
                                    <a href="#"> 
                                        <ul  > 
                                            <li><a href="../category/{{ $subcategory->name }}">
                                                {{ $subcategory->name }} {{ $subcategory->posts->count() }} 
                                            </a></li> 
                                        </ul>
                                    </a>
                                </li>  
                            @endforeach  
                    @endforeach 
        </ul>
      </div>
 

   </div>
