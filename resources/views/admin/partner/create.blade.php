@include('admin.head')
</head>
<form method="post" action="/order/store" class="form-group container mt-5">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
 <div class="row">
 	<div class="col-6">
 		<p>
        	<label for="title">Name</label><br>
        	<input type="text" class="form-control" name="name" value="">
    	</p>
 		<p>
        	<label for="title">Bank</label><br>
			<select class="form-control" name="partner_id" aria-label="Default select example">
				<option selected>Open this select menu</option>
				@foreach($banks as $row)
					<option value="{{$row->name}}">{{$row->id}}</option>
				@endforeach
			</select>	
    	</p>
 		<p>
        	<label for="title">Address</label><br>
        	<input type="text" class="form-control" name="address" value="">
    	</p>
 		<p>
        	<label for="title">Phone</label><br>
        	<input type="text" class="form-control" name="phone" value="">
    	</p>
 		<p>
        	<label for="title">Email</label><br>
        	<input type="email" class="form-control" name="email" value="">
    	</p>
 	</div>
 	<div class="col-6">
 		<p>
        	<label for="title">Note</label><br>
			<textarea class="form-control" name="note" rows="4"></textarea>
    	</p>
 		<p>
        	<label for="title">Old</label><br>
        	<input type="number" class="form-control" name="old" value="">
    	</p>
    	<p>
        	<button type="submit" class="form-control btn btn-success">Submit</button>
    	</p>
 	</div>
 </div>
</form>
