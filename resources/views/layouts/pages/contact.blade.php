@extends('layouts.app') 

@section('pageTitle')
   Contact Us
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1> Contact Us</h1>
			<div class="  form-group">
 
				<form class="form-horizontal" method="POST" action=" ">
                        {{ csrf_field() }}  

                        <div class="form-group ">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value=" " required autofocus>
 
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="textarea" class="col-md-4 control-label">Write Your Message</label>

                            <div class="col-md-6">
                                <textarea id="textarea" class="form-control" name="textarea" value=" " required></textarea>
 
                            </div>
                        </div>
              
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>
			</div>
		</div>
	</div>
</div>

@endsection

 