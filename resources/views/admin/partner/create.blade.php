@include('admin.head')
</head>
<form method="post" action="/partner/store" class="form-group container mt-5">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
 <div class="row">
 	<div class="col-6">
 		<p>
        	<label for="title">{{__('lang.name')}}</label><br>
        	<input type="text" class="form-control" name="name" value="">
    	</p>
 		<p>
        	<label for="title">{{__('lang.bank')}}</label><br>
			<select class="form-control" name="partner_id" aria-label="Default select example">
				<option selected>Open this select menu</option>
				@foreach($banks as $row)
					<option value="{{$row->name}}">{{$row->id}}</option>
				@endforeach
			</select>	
    	</p>
 		<p>
        	<label for="title">{{__('lang.address')}}</label><br>
        	<input type="text" class="form-control" name="address" value="">
    	</p>
 		<p>
        	<label for="title">{{__('lang.phone')}}</label><br>
        	<input type="text" class="form-control" name="phone" value="">
    	</p>
 		<p>
        	<label for="title">Email</label><br>
        	<input type="email" class="form-control" name="email" value="">
    	</p>
 	</div>
 	<div class="col-6">
 		<p>
        	<label for="title">{{__('lang.note')}}</label><br>
			<textarea class="form-control" name="note" rows="4"></textarea>
    	</p>
 		<p>
        	<label for="title">{{__('lang.old')}}</label><br>
        	<input type="date" class="form-control" name="old" value="" min="0">
    	</p>
    	<p>
        	<button type="submit" class="form-control btn btn-success">{{__('lang.submit')}}</button>
    	</p>
 	</div>
 </div>
</form>
