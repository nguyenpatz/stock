@include('admin.head')
<form method="post" action="/template/store"
	class="form-group container mt-5">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<div class="row">
		<div class="col-6">
			<p>
				<label for="title">Category</label><br>
				<select class="form-control"
					name="category_id" aria-label="Default select example">
					@foreach($category as $row)
					<option value="{{$row->id}}">{{$row->name}}</option> @endforeach
				</select>
			</p>
			<p>
				<label for="title">Name</label><br> 
				<input type="text" class="form-control" name="name" value="">
			</p>
		</div>
		<div class="col-6">
			<p>
				<label for="title">Data Manufacture</label><br>
				<input type="datetime-local" class="form-control" name="date_manufacture" value="">
			</p>
			<p>
				<label for="title">Date Expiry</label><br>
				<input type="datetime-local" class="form-control" name="expiry_date" value="">
			</p>
			<p>
				<label for="title">Note</label><br>
				<textarea class="form-control" name="note"></textarea>
			</p>
			<p>
				<button type="submit" class="form-control btn btn-success">Submit</button>
			</p>
		</div>
	</div>
</form>
