@include('admin.head')
<form method="post" action="/product/store" class="form-group container mt-5">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
 <div class="row">
 	<div class="col-6">
 	 	<p>
        	<label for="title">Template</label><br>
			<select class="form-control" name="template_id" aria-label="Default select example">
				<option selected>Open this select menu</option>
				@foreach($templates as $row)
					<option value="{{$row->id}}">{{$row->name}}</option>
				@endforeach
			</select>	
    	</p>
 		<p>
        	<label for="title">Name</label><br>
        	<input type="text" class="form-control" name="name" value="">
    	</p>
 		<p>
        	<label for="title">Price</label><br>
        	<div class="d-flex">
        		<input type="number" class="form-control" name="price" value="">
        		<span>đ</span>
        	</div>
    	</p>
 		<p>
        	<label for="title">Price Cost</label><br>
        	<div class="d-flex">
  		      	<input type="number" class="form-control" name="price_cost" value="">
  		      	<span>đ</span>
          	</div>
    	</p>
    	<p>
        	<label for="title">Color</label><br>
        	<input type="text" class="form-control" name="color" value="">
    	</p>
 	</div>
 	<div class="col-6">
		<p>
        	<label for="title">Height</label><br>
        	<div class="d-flex">
        		<input type="number" class="form-control" name="height" value="">
        		<span>m</span>
        	</div>
    	</p>
    	<p>
        	<label for="title">Length</label><br>
        	<div class="d-flex">
	        	<input type="number" class="form-control" name="length" value="">
	        	<span>m</span>
        	</div>
    	</p>
    	<p>
    	  	<label for="title">Width</label><br>
    		<div class="d-flex">
        		<input type="number" class="form-control" name="width" value="">
        		<span>m</span>
    		</div>
    	</p>
    	<p>
        	<label for="title">Weight</label><br>
        	<div class="d-flex">
        	     <input type="number" class="form-control" name="weight" value="">
        	     <span>kg</span>
        	</div>
    	</p>
    	<p>
        	<button type="submit" class="form-control btn btn-success">Submit</button>
    	</p>
 	</div>
 </div>
</form>
