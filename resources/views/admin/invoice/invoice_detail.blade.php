<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')

<div class="container">
	<div class="container row rounded border p-4">
		<div class="col-2">
			<a href="/invoice/edit/{{$invoices->ivid}}"><button class="btn btn-info" style="width: 70px">Edit</button></a>
			<a href="/invoice_delete/{{$invoices->ivid}}"><button class="btn btn-danger">Unlink</button></a>
			<button class="btn btn-success mt-1" style="width: 70px">Done</button>
			<button class="btn btn-success mt-1" style="width: 70px">Sent</button>
		</div>
		<div class="col-4">
			<ul>
                <li>{{__('lang.name')}}: {{ $invoices->ivname }}</li>
                <li>{{__('lang.partner')}}: {{ $invoices->ptname }}</li>
                <li>{{__('lang.createdate')}}: {{ $invoices->create_date }}</li>
                <li>{{__('lang.date_payment')}}: {{ $invoices->date_payment }}</li>
			</ul>
		</div>
		<div class="col-4">
			<ul>
                <li>{{__('lang.payment_term')}}: {{ $invoices->payment_term }}</li>
                <li>{{__('lang.order')}}: {{ $invoices->order_id }}</li>
			</ul>
		</div>
		<div class="col-2 align-self-center">
			<div class="bg-light rounded-circle d-flex justify-content-center py-3">{{$invoices->state}}</div>
		</div>
	</div>
	<div class="container mt-2">
	<table class="table">
        <thead>
         <tr class="bg-success">
            <th>Product</th>
            <th>Unit Price</th>
            <th>Amount</th>
            <th>Total Money</th>
            <th>Note</th>
          </tr>
        </thead>
        <tbody>
         @foreach($lines as $row)
          <tr>
            <td>{{$row->pname}}</td>
            <td>{{$row->unit_price}}</td>
            <td>{{$row->lamount}}</td>
            <td>{{$row->total_money}}</td>
            <td>{{$row->note}}</td>
          </tr>
           @endforeach
        </tbody>
      </table>
      <div class="my-5">
      	<div>Total Payment: <span class="h3 row ml-2">{{ $invoices->total_payment }} <p class="ml-1">VND</p></span></div>
      <div>
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
