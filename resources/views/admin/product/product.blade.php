<!DOCTYPE html>
<html lang="en">
<head>@include('admin.head')
</head>
@include('admin.main')
<a href="product_create">
	<button class="btn btn-success">Create</button>
</a>
<div class="container d-flex align-self-center">{{ $products->links() }}
</div>
<!-- Small boxes (Stat box) -->
<table class="table table-bordered table-hover">
	<thead>
		<tr class="bg-success">
			<th>{{__('lang.name')}}</th>
			<th>{{__('lang.price')}}</th>
			<th>{{__('lang.price_cost')}}</th>
			<th>{{__('lang.state')}}</th>
			<th>{{__('lang.height')}}</th>
			<th>{{__('lang.width')}}</th>
			<th>{{__('lang.length')}}</th>
			<th>{{__('lang.weight')}}</th>
			<th>{{__('lang.color')}}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $row)
		<tr>
			<td><a href="/product/{{$row->pid}}">{{$row->tname}}</a></td>
			<td>{{$row->price}} <sup>đ</sup></td>
			<td>{{$row->price_cost}} <sup>đ</sup></td>
			<td>{{$row->state}}</td>
			<td>{{$row->height}} <sup>m</sup></td>
			<td>{{$row->width}} <sup>m</sup></td>
			<td>{{$row->length}} <sup>m</sup></td>
			<td>{{$row->weight}} <sup>kg</sup></td>
			<td>{{$row->color}}</td>
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
