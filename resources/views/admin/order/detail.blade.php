<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')

<div class="container">
	<div class="container row rounded border p-4">
		<div class="col-2">
			<button class="btn btn-info" style="width: 70px">Edit</button>
			<button class="btn btn-danger" style="width: 70px">Unlink</button>
			<button class="btn btn-success mt-1" style="width: 70px">Done</button>
			<button class="btn btn-success mt-1" style="width: 70px">Sent</button>
			<button class="btn btn-success mt-1" style="width: 140px">Create Invoice</button>
		</div>
		<div class="col-4">
			<ul>
                <li>Name: {{ $orders->odname }}</li>
                <li>Partner: {{ $orders->ptname }}</li>
                <li>Create date: {{ $orders->create_date }}</li>
                <li>Expiration Date: {{ $orders->expiration_date }}</li>
			</ul>
		</div>
		<div class="col-4">
			<ul>
                <li>Received Date: {{ $orders->received_date }}</li>
                <li>Duration Inventory: {{ $orders->duration_inventory }}</li>
                <li>Employee: {{ $orders->epname }}</li>
                <li>Payment Term: {{ $orders->payment_term }}</li>
			</ul>
		</div>
		<div class="col-2 align-self-center">
			<div class="bg-light rounded-circle d-flex justify-content-center py-3">{{$orders->state}}</div>
		</div>
	</div>
	<div class="container mt-2">
	<table class="table table-bordered">
        <thead>
         <tr class="bg-success">
            <th>Create Date</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          @foreach($lines as $row)
          <tr>
            <td>{{$row->create_date}}</td>
            <td>{{$row->product_id}}</td>
            <td>{{$row->amount}}</td>
            <td>{{$row->price}}</td>
          </tr>
           @endforeach
        </tbody>
      </table>
	</div>
      <div class="my-5">
      	<div>Total Payment: <span class="h3 row ml-2">{{ $orders->total_payment }} <p class="ml-1">VND</p></span></div>
      <div>
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
