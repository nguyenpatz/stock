<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('admin.nav')
@include('admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
		<table class="table table-bordered">
    		<thead>
      			<tr class="bg-success">
        <th>Name</th>
        <th>Partner</th>
        <th>Create Date</th>
        <th>Expiration Date</th>
        <th>Received Date</th>
        <th>Duration Inventory</th>
        <th>Employee</th>
        <th>Total Payment</th>
        <th>Payment Term</th>
        <th>State</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>#</td>
        <td>
	        <button class="btn btn-success">View</button>
        </td>
      </tr>
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
