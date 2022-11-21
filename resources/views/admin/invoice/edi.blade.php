@include('admin.head')
</head>
<form method="post" action="/invoice/update/{{ $invoice->id}}"
	class="form-group container mt-5">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<div class="row">
		<div class="col-6">
			<p>
				<label for="title">Name</label><br> <input type="text"
					class="form-control" name="name" value="{{$invoice->name}}">
			</p>
			<p>
				<label for="title">Partner</label><br> <select class="form-control"
					name="partner_id" aria-label="Default select example">
					<option selected>Open this select menu</option> @foreach($partners
					as $row)
					<option value="{{$row->id}}">{{$row->name}}</option> @endforeach
				</select> <select class="form-control" name="order_id"
					aria-label="Default select example">
					<option selected>Open this select menu</option> @foreach($orders as
					$row)
					<option value="{{$row->id}}">{{$row->name}}</option> @endforeach
				</select>
			</p>
			<p>
				<label for="title">Create Date</label><br> <input
					type="datetime-local" class="form-control" name="create_date"
					value="{{$invoice->create_date}}">
			</p>
			<p>
				<label for="title">Date Payment</label><br> <input
					type="datetime-local" class="form-control" name="date_payment"
					value="{{$invoice->date_payment}}">
			</p>
		</div>
		<div class="col-6">
			<p>
				<label for="title">Payment Term</label><br> <input type="text"
					class="form-control" name="payment_term"
					value="{{$invoice->payment_term}}">
			</p>
			<p>
				<label for="title">Total Payment</label><br> <input type="number"
					class="form-control" name="total_payment"
					value="{{$invoice->total_payment}}">
			</p>
			<p>
				<button type="submit" class="form-control btn btn-success">Submit</button>
			</p>
		</div>
	</div>
</form>