<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('admin.nav')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	<div class="row my-2">
      		<form class="col-5 row">
      			<div class="col-7">
          			<input class="form-control" placeholder="Input data ...">
      			</div>
      			<div class="col-3">
          			<button class="btn btn-success">Search</button>
      			</div>
      		</form>
      	</div>
      	
      	<div class="my-2">
      		<button class="btn btn-success">Create</button>
      	</div>
        <!-- Small boxes (Stat box) -->
		<table class="table table-bordered">
    		<thead>
      			<tr class="bg-success">
        <th>Name</th>
        <th>Template</th>
        <th>Price</th>
        <th>Price Cost</th>
        <th>Date Manufacture</th>
        <th>Expery</th>
        <th>State</th>
        <th>Heigth</th>
        <th>Width</th>
        <th>Length</th>
        <th>Weigth</th>
        <th>Color</th>
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
        <td>#</td>
        <td>#</td>
        <td>
	        <button class="btn btn-success btn-sm">View</button>
	        <butoon class="btn btn-success btn-sm">Edit</butoon>
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
