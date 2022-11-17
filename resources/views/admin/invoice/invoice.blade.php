<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')
        <!-- Small boxes (Stat box) -->
<table class="table table-bordered">
    <thead>
     <tr class="bg-success">
        <th>Name</th>
        <th>Partner</th>
        <th>Create date</th>
        <th>Date Payment</th>
        <th>Payment Term</th>
        <th>Total Payment</th>
        <th>Sate</th>
        <th>Order</th>
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
        <td>
        <a href="/invoice_delete/{{$row->ivid}}">
        	<button class="btn">Unlink</button>
        </a>
        </td>
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
