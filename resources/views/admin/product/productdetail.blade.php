<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')

<div class="container">
	<div class="container-fluid row">
		<div class="col-6">
			<ul>
				<li>Name: {{ $products->name }}</li>
				<li>Templte: {{ $products->template_id }}</li>
				<li>Price: {{ $products->price }}</li>
				<li>Price Cost: {{ $products->price_cost }}</li>
				<li>Date Manufacture: {{ $products->date_manufacture }}</li>
			</ul>
		</div>
		<div class="col-6">
			<ul>
                <li>Expery: {{ $products->expery }}</li>
                <li>State: {{ $products->state }}</li>
                <li>Heigth: {{ $products->heigth }}</li>
                <li>Width: {{ $products->width }}</li>
                <li>Length: {{ $products->length }}</li>
                <li>Weigth: {{ $products->weigth }}</li>
                <li>Color: {{ $products->color }}</li>
                <li>Action: </li>
			</ul>
		</div>
	</div>
	<div class="container-fluid">
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
