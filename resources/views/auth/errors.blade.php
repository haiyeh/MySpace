@if(count($errors)>0)    
    <div class="alert alert-danger alert-dismissible" role="alert">
    	@foreach ($errors->all() as $error)
	  	    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <strong>Whoops! &nbsp;{{ $error }}</strong>
	    @endforeach    
	</div>
@endif
