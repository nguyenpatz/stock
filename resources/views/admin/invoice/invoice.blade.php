<!DOCTYPE html>
<html lang="en">
<head>@include('admin.head')
</head>
@include('admin.main')
<!-- Small boxes (Stat box) -->
<div class="d-flex justify-content-end">{{ $invoices->links() }}</div>

<table class="table table-bordered mt-4">
	<thead>
		<tr class="bg-success">
			<th>{{__('lang.name')}}</th>
			<th>{{__('lang.partner')}}</th>
			<th>{{__('lang.createdate')}}</th>
			<th>{{__('lang.date_payment')}}</th>
			<th>{{__('lang.payment_term')}}</th>
			<th>{{__('lang.total_payment')}}</th>
			<th>{{__('lang.state')}}</th>
			<th>{{__('lang.order')}}</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($invoices as $row)
		<tr>
			<td><a href="/invoice/{{$row->ivid}}">{{ $row->ivname}}</a></td>
			<td>{{ $row->ptname }}</td>
			<td>{{ $row->create_date }}</td>
			<td>{{$row->date_payment }}</td>
			<td>{{ $row->payment_term }}</td>
			<td>{{ $row->total_payment }}</td>
			<td>{{ $row->state }}</td>
			<td>{{ $row->order_id }}</td>
			<td><a href="/invoice_delete/{{$row->ivid}}">
					<button class="btn">Unlink</button>
			</a></td>
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
