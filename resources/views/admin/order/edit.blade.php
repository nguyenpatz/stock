@include('admin.head')
</head>
<form method="post" action="/order_update/{{$order->id}}" class="form-group container mt-5">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
 <div class="row">
 	<div class="col-6">
 		<p>
        	<label for="title">Name</label><br>
        	<input type="text" class="form-control" name="name" value="{{$order->name}}">
    	</p>
 		<p>
        	<label for="title">Partner</label><br>
			<select class="form-control" name="partner_id" aria-label="Default select example">
				@foreach($partners as $row)
					<option value="{{$row->id}}">{{$row->name}}</option>
				@endforeach
			</select>	
    	</p>
 		<p>
        	<label for="title">Create Date</label><br>
        	<input type="datetime-local" class="form-control" name="create_date" value="{{$order->create_date}}">
    	</p>
 		<p>
        	<label for="title">Expiration Date</label><br>
        	<input type="datetime-local" class="form-control" name="expiration_date" value="{{$order->expiration_date}}">
    	</p>
 		<p>
        	<label for="title">Received Date</label><br>
        	<input type="datetime-local" class="form-control" name="received_date" value="{{$order->received_date}}">
    	</p>
 	</div>
 	<div class="col-6">
 		<p>
        	<label for="title">Employee</label><br>
			<select class="form-control" name="employee_id" aria-label="Default select example">
				@foreach($employees as $row))
					<option value="{{$row->id}}">{{$row->name}}</option>
				@endforeach
			</select>	
    	</p>
 		<p>
        	<label for="title">Payment term</label><br>
        	<textarea rows="4" cols="50" class="form-control" name="payment_term">{{$order->payment_term}}</textarea>
    	</p>
    	<p>
        	<button type="submit" class="form-control btn btn-success">Submit</button>
    	</p>
 	</div>
 </div>
</form>
