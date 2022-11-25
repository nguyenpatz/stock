<!DOCTYPE html>
<html lang="en">
<head>@include('admin.head')
</head>
@include('admin.main')
<a href="/category_create">
	<button class="btn btn-success">
		{{__('lang.create')}}
	</button>
</a>
<!-- Small boxes (Stat box) -->
<table class="table table-bordered">
	<thead>
		<tr class="bg-success">
			<th>{{__('lang.name')}}</th>
			<th>{{__('lang.warehouse')}}</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($categories as $category)
		<tr>
			<th>{{$category->name}}</th>
			<th>{{$category->wname}}</th>
		</tr>
		@endforeach
	</tbody>
</table>

</div>
</section>
<!-- /.content -->
</div>
</div>
@include('admin.footer')
</body>
</html>
