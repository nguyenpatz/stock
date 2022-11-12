<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')

<div class="container">
	<div class="container row">
		<div class="col-6">
			<ul>
                <th>Name: {{ $invoices->name }}</th>
                <th>Partner: {{ $invoices->partner_id }}</th>
                <th>Create date: {{ $invoices->create_date }}</th>
                <th>Date Payment: {{ $invoices->date_payment }}</th>
			</ul>
		</div>
		<div class="col-6">
			<ul>
                <th>Payment Term: {{ $invoices->payment_term }}</th>
                <th>Total Payment: {{ $invoices->total_payment }}</th>
                <th>Sate: {{ $invoices->state }}</th>
                <th>Order: {{ $invoices->order_id }}</th>
			</ul>
		</div>
	</div>
	<div class="container">
        <thead>
         <tr class="bg-success">
            <th>Product</th>
            <th>Amount</th>
            <th>Unit Price</th>
            <th>Amount</th>
            <th>Total Money</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
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
