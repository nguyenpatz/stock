@include('admin.head')
</head>
<form method="post" action="{{route('category.store')}}" class="form-group container mt-5">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
 <div class="row">
 	<div class="col-6">
 		<p>
        	<label for="title">{{__('lang.name')}}</label><br>
        	<input type="text" class="form-control" name="name" value="">
    	</p>
 		<p>
        	<label for="title">{{__('lang.warehouse')}}</label><br>
			<select class="form-control" name="warehouse_id" aria-label="Default select example">
				@foreach ($warehouses as $warehouse)
				<option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
				@endforeach
			</select>
    	</p>
    	<p>
        	<button type="submit" class="form-control btn btn-success">{{__('lang.submit')}}</button>
    	</p>
 	</div>
 </div>
</form>
