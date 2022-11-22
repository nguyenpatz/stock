@include('admin.head')
</head>
<form method="post" action="{{route('partner.store')}}" class="form-group container mt-5">
 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
 <div class="row">
 	<div class="col-6">
 		<p>
        	<label for="title">{{__('lang.name')}}</label><br>
        	<input type="text" class="form-control" name="name" value="">
    	</p>
 		<p>
        	<label for="title">{{__('lang.bank')}}</label><br>
			<select class="form-control" name="bank_name" aria-label="Default select example">
				<option selected>Open this select menu</option>
				@foreach($banks as $row)
					<option value="{{$row}}">{{$row}}</option>
				@endforeach
			</select>	
    	</p>
		<p>
        	<label for="title">{{__('lang.account_number')}}</label><br>
			<!-- oninput regex để lấy mỗi giá trị là số, không phải số  thì không hiển thị ra input-->
        	<input type="text" class="form-control" name="account_number" value="" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
    	</p>
 		<p>
        	<label for="title">{{__('lang.address')}}</label><br>
        	<input type="text" class="form-control" name="address" value="">
    	</p>
 		<p>
        	<label for="title">{{__('lang.phone')}}</label><br>
			<!-- oninput regex để lấy mỗi giá trị là số, không phải số  thì không hiển thị ra input-->
        	<input type="text" class="form-control" name="phone" value="" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
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
        	<label for="title">{{__('lang.birthday')}}</label><br>
        	<input type="date" class="form-control" name="birthday" value="" min="0">
    	</p>
    	<p>
        	<button type="submit" class="form-control btn btn-success">{{__('lang.submit')}}</button>
    	</p>
 	</div>
 </div>
</form>
