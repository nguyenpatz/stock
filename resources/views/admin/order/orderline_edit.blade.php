@include('admin.head')
<form method="post" action="/orderline_update/{{$orderline->id}}"
	" class="form-group container mt-5">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<div class="row">
		<div class="col-6">
			<p>
				<label for="title">Product</label><br> <select class="form-control"
					name="template_id" >
					<option selected>{{$orderline->template_id}}</option>
					@foreach($templates as $row)
					<option value="{{$row->id}}">{{$row->name}}</option> @endforeach
				</select>
			</p>
			<p>
				<input type="number" class="form-control" name="order_id"
					value="{{$orderline->order_id}}">
			</p>
			<p>
                <label for="note">Note</label>
                <textarea class="form-control" name="note">{{$orderline->note}}</textarea>
            <p>
				<button type="submit" class="form-control btn btn-success">Submit</button>
			</p>
		</div>
	</div>
</form>
