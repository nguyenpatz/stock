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
				<li>Name: {{ $templaye->name }}</li>
				<li>Partner: {{$template->ptname}}</li>
				<li>Date Manufacture: {{ $template->date_manufacture }}</li>
				<li>Expiry Date: {{ $template->expiry_date }}</li>
			</ul>
		</div>
		<div class="col-6">
		Note: {{ $template->note}}	
		</div>
	</div>
	<div class="container-fluid">
	<a><button class="btn btn-info">Add</button></a>
<table class="table table-bordered">
    <thead>
     <tr class="bg-success">
        <th>Height</th>
        <th>Width</th>
        <th>Length</th>
        <th>Weight</th>
        <th>Color</th>
        <th>Price</th>
        <th>Price cost</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $row)
      <tr>
        <td><a href="/product/{{$row->id}}">{{ $row->height}}</a></td>
        <td>{{ $row->width }}</td>
        <td>{{ $row->length }}</td>
        <td>{{ $row->weight}}</td>
        <td>{{ $row->color}}</td>
        <td>{{ $row->price}}}</td>
        <td>{{ $row->price_cost}}</td>
        <td><a>Edit</a><a>Remove</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
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
