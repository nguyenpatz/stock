<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
@include('admin.main')
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
		<table class="table table-bordered">
    		<thead>
      			<tr class="bg-success">
        <th>Name</th>
        <th>Delivery Address</th>
        <th>Received Date</th>
        <th>Delivery Date</th>
        <th>Partner</th>
        <th>State</th>
      </tr>
    </thead>
    <tbody>
    @foreach($ipep as $row)
      <tr>
        <td><a href="/ipep/{{$row->id}}">{{ $row->name}}</a></td>
        <td>{{ $row->delivery_address }}</td>
        <td>{{ $row->received_date }}</td>
        <td>{{$row->delivery_date }}</td>
        <td>{{ $row->partner_id }}</td>
        <td>{{ $row->status }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->
@include('admin.footer')
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
