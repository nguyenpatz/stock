@include('admin.head')
<form method="post" action="/order_line/store" class="form-group container mt-5">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
 <div class="row">
 	<div class="col-6">
 		<p>
        	<label for="title">Product</label><br>
        	<div class="d-flex align-items-center">
			<select class="form-control" name="product_id" aria-label="Default select example">
				<option selected>Open this select menu</option>
				@foreach($products as $row)
					<option value="{{$row->id}}">{{$row->name}}</option>
				@endforeach
			</select>	
      		</div>
    	</p>
 		<div>
        	<label for="title">Amount</label><br>
        	<input type="number" class="form-control" name="amount" value="">
    	</p>
 		<p>
        	<label for="title">Price</label><br>
        	<input type="number" class="form-control" name="price" value="">
    	</p>
    	<p>
        	<label for="title">Create Date</label><br>
        	<input type="datetime-local" class="form-control" name="create_date" value="{{date('Y-m-d H:i:s')}}">
    	</p>
    	<p><input type="number" class="form-control" name="order_id" value="{{$id}}"></p>
 	</div>
 	<div class="col-6">
    	<p>
        	<button type="submit" class="form-control btn btn-success">Submit</button>
    	</p>
 	</div>
 </div>
</form>
