@include('admin.head')
</head>
<form method="post" action="/fail_save/{{$id}}"
	class="form-group container mt-5">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<div class="container">
        <label for="title">Name</label><br>
        <textarea class="form-control" name="note"></textarea>
        <button type="submit" class="form-control btn btn-success">Save</button>
	</div>
</form>
