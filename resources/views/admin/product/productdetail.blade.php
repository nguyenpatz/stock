<!DOCTYPE html>
<html lang="en">
<head>@include('admin.head')
</head>
@include('admin.main')
<a href="/product_create">
	<button class="btn btn-success">Create</button>
</a>
<div class="container">
	<div class="container-fluid row">
		<div class="col-4">
			<ul>
				<li>{{__('lang.name')}}: {{ $products->tname }}</li>
				<li>{{__('lang.price')}}: {{ $products->price }} <sup>đ</sup></li>
				<li>{{__('lang.price_cost')}}: {{ $products->price_cost }} <sup>đ</sup></li>
			</ul>
		</div>
		<div class="col-4">
			<ul>
				<li>{{__('lang.state')}}: {{ $products->state }}</li>
				<li>{{__('lang.height')}}: {{ $products->height }} <sup>m</sup></li>
				<li>{{__('lang.width')}}: {{ $products->width }} <sup>m</sup></li>
				<li>{{__('lang.length')}}: {{ $products->length }} <sup>m</sup></li>
				<li>{{__('lang.weight')}}: {{ $products->weight }} <sup>kg</sup></li>
				<li>{{__('lang.color')}}: {{ $products->color }}</li>
				<li>{{__('lang.date_manufacture')}}: {{$template->date_manufacture}}</li>
				<li>{{__('lang.date_expiry')}}: {{$template->expiry_date}}</li>
			</ul>
		</div>
		<div class="col-2 align-self-center">
			<div
				class="bg-light rounded-circle d-flex justify-content-center py-3">{{$products->state}}</div>
		</div>
	</div>
	<div class="container">
        Note: </br>{{ $products->note}}
	</div>
</div>
</div>
</section>
<!-- /.content -->
</div>
</div>
@include('admin.footer')
</body>
</html>
