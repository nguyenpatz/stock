<!DOCTYPE html>
<html lang="en">
<head>@include('admin.head')
</head>
@include('admin.main')
<a href="template_create">
	<button class="btn btn-success">Create</button>
</a>
<div class="d-flex justify-content-end">{{ $template->links() }}</div>

<table class="table table-bordered">
	<thead>
		<tr class="bg-success">
			<th>{{__('lang.name')}}</th>
			<th>{{__('lang.category')}}</th>
			<th>{{__('lang.amount')}}</th>
			<th>{{__('lang.date_manufacture')}}</th>
			<th>{{__('lang.date_expiry')}}</th>
			<th>{{__('lang.state')}}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($template as $row)
		<tr>
			<td><a href="/template/{{$row->tid}}">{{ $row->tname}}</a></td>
			<td>{{ $row->cname }}</td>
			<td>{{ $row->amount}}</td>
			<td>{{ $row->date_manufacture}}</td>
			<td>{{$row->expiry_date }}</td>
			<td>{{$row->state}}</td>
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
